<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'login_id' => 'required|string|max:255|unique:users,login_id',
            'role' => 'required|in:lecturer,student',
            'password' => 'required|string|min:8',
            'course' => 'nullable|string|max:255',
            'semester' => 'nullable|integer|min:1',
            'class' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $validated['name'],
            'login_id' => $validated['login_id'],
            'role' => $validated['role'],
            'password' => $validated['password'],
            'course' => $validated['course'] ?? null,
            'semester' => $validated['semester'] ?? null,
            'class' => $validated['class'] ?? null,
            'department' => $validated['department'] ?? null,
            'status' => 'active',
        ]);

        return redirect()
            ->route('admin.manage-users')
            ->with('success', 'User created successfully!');
    }

    
    public function edit(User $user)
    {
        // Admin tidak boleh mengedit akaun admin melalui fungsi ini.
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.manage-users')
                ->with('error', 'Admin accounts cannot be edited here.');
        }

        return view('admin.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.manage-users')
                ->with('error', 'Admin accounts cannot be edited here.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'login_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'login_id')->ignore($user->id),
            ],
            'role' => 'required|in:lecturer,student',
            'password' => 'nullable|string|min:8',
            'course' => 'nullable|string|max:255',
            'semester' => 'nullable|integer|min:1',
            'class' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
        ]);

        $user->name = $validated['name'];
        $user->login_id = $validated['login_id'];
        $user->role = $validated['role'];
        $user->course = $validated['course'] ?? null;
        $user->semester = $validated['semester'] ?? null;
        $user->class = $validated['class'] ?? null;
        $user->department = $validated['department'] ?? null;

        // Password hanya dikemas kini jika medan tidak kosong.
        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()
            ->route('admin.manage-users')
            ->with('success', 'User updated successfully!');
    }

}
