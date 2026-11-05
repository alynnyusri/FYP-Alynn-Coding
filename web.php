<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Lecturer\ProfileController;
use App\Http\Controllers\Admin\SubjectController;
use App\Models\User;
use App\Models\Venue;
use App\Models\Schedule;

// Public routes
Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    switch (auth()->user()->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');

        case 'lecturer':
            return redirect()->route('lecturer.dashboard');

        case 'student':
            return redirect()->route('student.dashboard');

        default:
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect()->route('login');
    }
});

Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest')
    ->name('login.authenticate');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Lecturer pages
    Route::middleware('role:lecturer')->group(function () {

        Route::patch('/lecturer/assessments/{id}/complete', [ScheduleController::class, 'markCompleted']
            )->name('lecturer.assessments.complete');

        Route::get('/lecturer/dashboards', [ScheduleController::class, 'lecturerDashboard'])
            ->name('lecturer.dashboards');

        Route::get('/lecturer/create-assessment', [
            ScheduleController::class,
            'create'
        ])->name('lecturer.create-assessment');

        Route::post('/lecturer/assessments', [
            ScheduleController::class,
            'store'
        ])->name('lecturer.assessments.store');

        
        Route::get('/lecturer/assessment-calendar', [
            ScheduleController::class,
            'calendarEvents'
        ])->name('lecturer.assessments.calendar');

       Route::get('/lecturer/schedule', [ScheduleController::class, 'lecturerSchedule'])
            ->name('lecturer.schedule');

        Route::get('/lecturer/notifications', [
            ScheduleController::class,
            'lecturerNotifications'
        ])->name('lecturer.notifications');

        Route::get('/lecturer/assessment-details', function () {
            return view('lecturer.assessment-details');
        })->name('lecturer.assessment-details');

        Route::get('/lecturer/search-schedule', function () {
            return view('lecturer.search-schedule');
        })->name('lecturer.search-schedule');

        Route::get('/lecturer/my-classes', [
            ScheduleController::class,
            'myClasses'
        ])->name('lecturer.my-classes');

        Route::get('/lecturer/manage-schedule', [
            ScheduleController::class,
            'manageSchedule'
        ])->name('lecturer.manage-schedule');

        // Update assessment
        Route::put('/lecturer/manage-schedule/{id}', [
            ScheduleController::class,
            'update'
        ])->name('lecturer.manage-schedule.update');

        // Delete assessment
        Route::delete('/lecturer/manage-schedule/{id}', [
            ScheduleController::class,
            'destroy'
        ])->name('lecturer.manage-schedule.destroy');



        Route::get('/lecturer/profile', [ProfileController::class, 'show'])
            ->name('lecturer.profile');
    });

    // Student pages
    Route::middleware('role:student')->group(function () {

        Route::get('/student/dashboards', [
            ScheduleController::class,
            'studentDashboard'
        ])->name('student.dashboards');

        Route::get('/student/schedule', [
            ScheduleController::class,
            'studentSchedule'
        ])->name('student.schedule');

        Route::get('/student/search-schedule', function () {
            return view('student.search-schedule');
        })->name('student.search-schedule');

        Route::get('/student/assessment-details', function () {
            return view('student.assessment-details');
        })->name('student.assessment-details');

        Route::get('/student/notifications', [
            ScheduleController::class,
            'studentNotifications'
        ])->name('student.notifications');

        Route::get('/student/profile', function () {
            return view('student.profile');
        })->name('student.profile');
    });

    // Admin pages
    Route::middleware('role:admin')->group(function () {
        
        Route::get('/admin/profile', function () {
            return view('admin.profile');
        })->name('admin.profile');

        Route::resource('admin/subjects', SubjectController::class)
        ->names([
            'index' => 'admin.subjects.index',
            'create' => 'admin.subjects.create',
            'store' => 'admin.subjects.store',
            'show' => 'admin.subjects.show',
            'edit' => 'admin.subjects.edit',
            'update' => 'admin.subjects.update',
            'destroy' => 'admin.subjects.destroy',
        ]);

        Route::get('/admin/manage-users/{user}/edit', [
            \App\Http\Controllers\Admin\UserController::class,
            'edit'
        ])->name('admin.manage-users.edit');

        Route::patch('/admin/manage-users/{user}', [
            \App\Http\Controllers\Admin\UserController::class,
            'update'
        ])->name('admin.manage-users.update');    

        Route::get('/admin/manage-users/create', function () {
            return view('admin.create-user');
        })->name('admin.manage-users.create');

        Route::post('/admin/manage-users', [
            \App\Http\Controllers\Admin\UserController::class,
            'store'
        ])->name('admin.manage-users.store');
  
        Route::patch('/admin/manage-users/{user}/status', function (\App\Models\User $user) {
            // Jangan benarkan akaun admin dinyahaktifkan melalui fungsi ini.
            if ($user->role === 'admin') {
                return back()->with('error', 'Admin account status cannot be changed here.');
            }

            $user->status = $user->status === 'active' ? 'inactive' : 'active';
            $user->save();

            return back()->with('success', 'User status updated successfully.');
        })->name('admin.manage-users.status');

        Route::get('/admin/dashboards', function () {

            // Dashboard statistics
            $totalUsers = User::whereIn('role', ['lecturer', 'student'])->count();

            $totalVenues = Venue::count();

            $scheduledAssessments = Schedule::where('status', 'pending')->count();

            $completedAssessments = Schedule::where('status', 'completed')->count();

            // Recent assessment schedules
            $recentSchedules = Schedule::with('lecturer:id,name')
                ->latest()
                ->take(5)
                ->get();

            return view('admin.dashboards', compact(
                'totalUsers',
                'totalVenues',
                'scheduledAssessments',
                'completedAssessments',
                'recentSchedules'
            ));

        })->name('admin.dashboard');

        Route::get('/admin/manage-schedules', [
            ScheduleController::class,
            'index'
        ])->name('admin.manage-schedules');

        Route::get('/admin/manage-users', function () {
            $users = \App\Models\User::orderBy('name')->get();

            return view('admin.manage-users', [
                'users' => $users,
                'totalUsers' => $users->count(),
                'totalLecturers' => $users->where('role', 'lecturer')->count(),
                'totalStudents' => $users->where('role', 'student')->count(),
            ]);
        })->name('admin.manage-users');

        Route::get('/admin/manage-venues', [
            VenueController::class,
            'index'
        ])->name('admin.manage-venues');

        Route::post('/admin/manage-venues', [
            VenueController::class,
            'store'
        ])->name('admin.manage-venues.store');

        Route::get('/admin/manage-venues/{venue}/edit', [
            VenueController::class,
            'edit'
        ])->name('admin.manage-venues.edit');

        Route::patch('/admin/manage-venues/{venue}', [
            VenueController::class,
            'update'
        ])->name('admin.manage-venues.update');

        Route::patch('/admin/manage-venues/{venue}/toggle-status', [
            VenueController::class,
            'toggleStatus'
        ])->name('admin.manage-venues.toggle-status');

        Route::get('/admin/reports', function () {
            return view('admin.reports');
        })->name('admin.reports');

        Route::get('/admin/create-notification', [NotificationController::class, 'index'])
            ->name('admin.create-notification');

        Route::post('/admin/create-notification', [NotificationController::class, 'store'])
            ->name('admin.create-notification.store');

        Route::post(
            '/admin/notifications/{id}/send',
            [NotificationController::class, 'send']
        )->name('admin.notifications.send');
        
        Route::get(
            '/admin/notifications/{id}/edit',
            [NotificationController::class, 'edit']
        )->name('admin.notifications.edit');

        Route::put(
            '/admin/notifications/{id}',
            [NotificationController::class, 'update']
        )->name('admin.notifications.update');

        Route::delete(
            '/admin/notifications/{id}',
            [NotificationController::class, 'destroy']
        )->name('admin.notifications.destroy');

        Route::get('/admin/reports', [ReportController::class, 'index'])
            ->name('admin.reports');

        Route::get('/admin/reports/pdf', [ReportController::class, 'generatePdf'])
            ->name('admin.reports.pdf');
    });
});
