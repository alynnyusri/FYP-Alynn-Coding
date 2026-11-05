<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Notification;
use App\Models\Subject;
use App\Models\Venue;
use Illuminate\Http\Request;


class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate input daripada borang
        $validated = $request->validate([
            'subject' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $subjectExists = Subject::where('subject_name', $value)
                        ->where('department', auth()->user()->department)
                        ->exists();

                    if (!$subjectExists) {
                        $fail('You can only select subjects from your own department.');
                    }
                },
            ],
            'assessment_type' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'venue' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $venueExists = Venue::where('venue_name', $value)
                        ->where('status', 'active')
                        ->exists();

                    if (!$venueExists) {
                        $fail('This venue is no longer available. Please select another venue.');
                    }
                },
            ],
            'description' => 'nullable|string',
        ]);

        // 2. Kira masa mula dan tamat assessment baharu
        $newStart = \Carbon\Carbon::parse(
            $validated['date'] . ' ' . $validated['start_time']
        );

        $newEnd = $newStart->copy()->addMinutes(
            (int) $validated['duration']
        );

        
        // 3. Had maksimum 2 assessment sehari untuk kelas yang sama
        $dailyAssessmentCount = Schedule::where(
            'class',
            $validated['class']
        )
            ->whereDate('date', $validated['date'])
            ->count();

        if ($dailyAssessmentCount >= 2) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'availability' =>
                        'Booking failed! This class has reached the maximum limit of 2 assessments per day.'
                ]);
        }

        // 3. Semak konflik kelas pada tarikh yang sama
        $existingSchedules = Schedule::where(
            'class',
            $validated['class']
        )
            ->whereDate('date', $validated['date'])
            ->get();

        
        foreach ($existingSchedules as $existing) {
            $existingStart = \Carbon\Carbon::parse(
                $existing->date . ' ' . $existing->start_time
            );

            $existingEnd = $existingStart->copy()->addMinutes(
                (int) $existing->duration
            );

            // Tolak jika masa assessment kelas bertindih
            if (
                $newStart->lt($existingEnd) &&
                $newEnd->gt($existingStart)
            ) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'availability' =>
                            'Booking failed! This class already has an assessment during the selected time. Please choose another time slot.'
                    ]);
            }

            // Semak jarak minimum 60 minit antara assessment
            $minimumGap = 60;

            $gapBefore = $existingStart->diffInMinutes(
                $newEnd,
                false
            );

            $gapAfter = $newStart->diffInMinutes(
                $existingEnd,
                false
            );

            if (
                ($newEnd->lte($existingStart) &&
                    $existingStart->diffInMinutes($newEnd) < $minimumGap)
                ||
                ($newStart->gte($existingEnd) &&
                    $newStart->diffInMinutes($existingEnd) < $minimumGap)
            ) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'availability' =>
                            'Booking failed! There must be at least 60 minutes between assessments for the same class.'
                    ]);
            }
        }

        // 4. Semak konflik venue pada tarikh yang sama
        $existingVenueSchedules = Schedule::where(
            'venue',
            $validated['venue']
        )
            ->whereDate('date', $validated['date'])
            ->get();

        foreach ($existingVenueSchedules as $existing) {
            $existingStart = \Carbon\Carbon::parse(
                $existing->date . ' ' . $existing->start_time
            );

            $existingEnd = $existingStart->copy()->addMinutes(
                (int) $existing->duration
            );

            // Tolak jika venue digunakan pada masa bertindih
            if (
                $newStart->lt($existingEnd) &&
                $newEnd->gt($existingStart)
            ) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'availability' =>
                            'Booking failed! This venue is already booked during the selected time. Please choose another venue or time slot.'
                    ]);
            }
        }

        // 5. Simpan assessment jika tiada konflik
        $validated['lecturer_id'] = auth()->id();
        $validated['status'] = 'pending';

        $schedule = Schedule::create($validated);

        // Create notification for the selected class
        Notification::create([
            'title' => 'New Assessment Scheduled',
            'recipient' => 'Students',
            'recipient_class' => $validated['class'],
            'category' => 'Assessment Reminder',
            'notification_date' => $validated['date'],
            'message' => 'A new assessment has been scheduled for your class.'
                . "\n\nSubject: " . $validated['subject']
                . "\nAssessment Type: " . $validated['assessment_type']
                . "\nDate: " . $validated['date']
                . "\nTime: " . $validated['start_time']
                . "\nDuration: " . $validated['duration'] . ' minutes'
                . "\nVenue: " . $validated['venue'],
            'status' => 'Sent',
        ]);

        return redirect()->back()->with(
            'success',
            'Assessment saved successfully!'
        );
    }

    public function index()
    {
        $schedules = Schedule::with('lecturer')
            ->orderByDesc('date')
            ->orderByDesc('start_time')
            ->get();

        $totalSchedules = $schedules->count();

        $scheduledCount = $schedules
            ->where('status', 'pending')
            ->count();

        $completedCount = $schedules
            ->where('status', 'completed')
            ->count();

        $venues = Venue::orderBy('venue_name')->get();

        return view('admin.manage-schedules', compact(
            'schedules',
            'totalSchedules',
            'scheduledCount',
            'completedCount',
            'venues'
        ));
    }

    public function calendarEvents(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        $startDate = $request->input('month') . '-01';

        $start = \Carbon\Carbon::createFromFormat(
            'Y-m-d',
            $startDate
        )->startOfMonth();

        $end = $start->copy()->endOfMonth();

        $schedules = Schedule::with('lecturer:id,name')
            ->whereHas('lecturer', function ($query) {
                $query->where(
                    'department',
                    auth()->user()->department
                );
            })
            ->whereBetween('date', [
                $start->toDateString(),
                $end->toDateString(),
            ])
            ->get([
                'id',
                'lecturer_id',
                'subject',
                'assessment_type',
                'class',
                'date',
                'start_time',
                'duration',
                'venue',
                'status',
            ])
            ->map(function ($schedule) {
                return [
                    'id' => $schedule->id,
                    'subject' => $schedule->subject,
                    'assessment_type' => $schedule->assessment_type,
                    'class' => $schedule->class,
                    'date' => $schedule->date,
                    'start_time' => $schedule->start_time,
                    'duration' => $schedule->duration,
                    'venue' => $schedule->venue,
                    'status' => $schedule->status,
                    'lecturer_name' => $schedule->lecturer?->name
                        ?? 'Not available',
                ];
            });

        return response()->json($schedules);
    }

    
    public function lecturerDashboard()
    {
        // Ambil semua assessment milik lecturer yang sedang login
        $allAssessments = Schedule::where('lecturer_id', auth()->id())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        // Assessment yang belum ditandakan completed
        $upcomingAssessments = $allAssessments
            ->where('status', '!=', 'completed')
            ->values();

        // Assessment yang sudah ditandakan completed
        $completedAssessments = $allAssessments
            ->where('status', 'completed')
            ->values();

        return view('lecturer.dashboards', compact(
            'upcomingAssessments',
            'completedAssessments'
        ));
    }

    public function lecturerSchedule()
    {
        $assessments = Schedule::where('lecturer_id', auth()->id())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get([
                'id',
                'subject',
                'assessment_type',
                'class',
                'date',
                'start_time',
                'duration',
                'venue',
                'status'
            ]);

        return view('lecturer.schedule', compact('assessments'));
    }

    
    public function myClasses()
    {
        $classes = Schedule::where('lecturer_id', auth()->id())
            ->orderBy('class')
            ->orderBy('subject')
            ->get([
                'id',
                'class',
                'subject',
                'assessment_type',
                'date',
                'start_time',
                'venue'
            ])
            ->groupBy('class');

        return view('lecturer.my-classes', compact('classes'));
    }


    public function manageSchedule()
    {
        $assessments = Schedule::where('lecturer_id', auth()->id())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('lecturer.manage-schedule', compact('assessments'));
    }

    
    public function markCompleted($id)
    {
        $assessment = Schedule::where('lecturer_id', auth()->id())
            ->findOrFail($id);

        $assessment->status = 'completed';
        $assessment->save();

        return redirect()->back()->with(
            'success',
            'Assessment marked as completed successfully!'
        );
    }

    public function studentDashboard()
    {
        $student = auth()->user();

        // Get notifications for students
        $student = auth()->user();

        $notificationQuery = Notification::whereIn('recipient', [
            'Students',
            'All Users'
        ])
        ->where('status', 'Sent')
        ->where(function ($query) use ($student) {
            $query->whereNull('recipient_class')
                ->orWhere('recipient_class', $student->class);
        });

        $totalNotifications = (clone $notificationQuery)->count();

        $recentNotifications = (clone $notificationQuery)
            ->orderByDesc('notification_date')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $totalSubjects = Schedule::where('class', $student->class)
            ->distinct('subject')
            ->count('subject');

        $upcomingAssessments = Schedule::where('class', $student->class)
            ->where('status', '!=', 'completed')
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $completedAssessments = Schedule::where('class', $student->class)
            ->where('status', 'completed')
            ->orderBy('date', 'desc')
            ->orderBy('start_time')
            ->get();

        return view('student.dashboards', compact(
            'upcomingAssessments',
            'completedAssessments',
            'totalSubjects',
            'totalNotifications',
            'recentNotifications'
        ));
    }

    public function studentSchedule()
    {
        $student = auth()->user();

        // Get assessments for the logged-in student's class
        $assessments = Schedule::with('lecturer')
            ->where('class', $student->class)
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        // Calculate total assessments
        $totalAssessments = $assessments->count();

        // Calculate upcoming assessments
        $upcomingCount = $assessments->filter(function ($assessment) {
            return $assessment->status !== 'completed'
                && \Carbon\Carbon::parse($assessment->date)
                    ->toDateString() >= now()->toDateString();
        })->count();

        // Calculate unique assessment venues
        $venueCount = $assessments
            ->pluck('venue')
            ->filter()
            ->unique()
            ->count();

        return view('student.schedule', compact(
            'assessments',
            'totalAssessments',
            'upcomingCount',
            'venueCount'
        ));
    }

    public function studentNotifications()
    {
        $notifications = Notification::whereIn('recipient', [
            'Students',
            'All Users'
        ])
        ->where('status', 'Sent')
        ->orderByDesc('notification_date')
        ->orderByDesc('created_at')
        ->get();

        $totalNotifications = $notifications->count();

        $assessmentReminders = $notifications
            ->where('category', 'Assessment Reminder')
            ->count();

        $scheduleUpdates = $notifications
            ->where('category', 'Schedule Update')
            ->count();

        return view('student.notifications', compact(
            'notifications',
            'totalNotifications',
            'assessmentReminders',
            'scheduleUpdates'
        ));
    }

    public function lecturerNotifications()
    {
        $notifications = Notification::whereIn('recipient', [
            'Lecturers',
            'All Users'
        ])
        ->where('status', 'Sent')
        ->orderByDesc('notification_date')
        ->orderByDesc('created_at')
        ->get();

        $totalNotifications = $notifications->count();

        $assessmentReminders = $notifications
            ->where('category', 'Assessment Reminder')
            ->count();

        $scheduleUpdates = $notifications
            ->where('category', 'Schedule Update')
            ->count();

        return view('lecturer.notifications', compact(
            'notifications',
            'totalNotifications',
            'assessmentReminders',
            'scheduleUpdates'
        ));
    }

    public function create()
    {
        // Get subjects based on lecturer's department
        $subjects = Subject::where(
            'department',
            auth()->user()->department
        )
        ->orderBy('subject_name')
        ->get();

        // Get registered student classes
        $classes = User::where('role', 'student')
            ->whereNotNull('class')
            ->where('class', '!=', '')
            ->distinct()
            ->orderBy('class')
            ->pluck('class');

        // Get active venues
        $venues = Venue::where('status', 'active')
            ->orderBy('venue_name')
            ->get();

        return view('lecturer.create-assessment', compact(
            'subjects',
            'classes',
            'venues'
        ));
    }

    public function update(Request $request, $id)
    {
        $assessment = Schedule::where('lecturer_id', auth()->id())
            ->findOrFail($id);

        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'assessment_type' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'venue' => 'required|string|max:255',
        ]);

        $assessment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Assessment updated successfully!',
        ]);
    }

    public function destroy($id)
    {
        $assessment = Schedule::where('lecturer_id', auth()->id())
            ->findOrFail($id);

        $assessment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Assessment deleted successfully!',
        ]);
    }


}
