<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->get();

        $totalNotifications = $notifications->count();

        $sentNotifications = $notifications
            ->where('status', 'Sent')
            ->count();

        $draftNotifications = $notifications
            ->where('status', 'Draft')
            ->count();

        return view('admin.create-notification', compact(
            'notifications',
            'totalNotifications',
            'sentNotifications',
            'draftNotifications'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'recipient' => 'required|in:All Users,Lecturers,Students',
            'category' => 'required|in:General Announcement,Assessment Reminder,Schedule Update,Scheduling Conflict,Important Notice',
            'notification_date' => 'required|date',
            'message' => 'required|string|max:1000',
            'status' => 'required|in:Sent,Draft',
        ]);

        Notification::create($validated);

        return redirect()
            ->route('admin.create-notification')
            ->with('success', 'Notification saved successfully!');
    }

    public function send($id)
    {
        $notification = Notification::findOrFail($id);

        if ($notification->status !== 'Draft') {
            return redirect()
                ->route('admin.create-notification')
                ->with('success', 'This notification has already been sent.');
        }

        $notification->update([
            'status' => 'Sent',
        ]);

        return redirect()
            ->route('admin.create-notification')
            ->with('success', 'Draft notification marked as sent successfully!');
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);

        if ($notification->status !== 'Draft') {
            return redirect()
                ->route('admin.create-notification')
                ->with('success', 'Only draft notifications can be edited.');
        }

        return view('admin.edit-notification', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        if ($notification->status !== 'Draft') {
            return redirect()
                ->route('admin.create-notification')
                ->with('success', 'Only draft notifications can be edited.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'recipient' => 'required|in:All Users,Lecturers,Students',
            'category' => 'required|in:General Announcement,Assessment Reminder,Schedule Update,Scheduling Conflict,Important Notice',
            'notification_date' => 'required|date',
            'message' => 'required|string|max:1000',
        ]);

        $notification->update($validated);

        return redirect()
            ->route('admin.create-notification')
            ->with('success', 'Notification updated successfully!');
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);

        if ($notification->status !== 'Draft') {
            return redirect()
                ->route('admin.create-notification')
                ->with('success', 'Only draft notifications can be deleted.');
        }

        $notification->delete();

        return redirect()
            ->route('admin.create-notification')
            ->with('success', 'Draft notification deleted successfully!');
    }
}