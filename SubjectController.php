<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('department')
            ->orderBy('subject_name')
            ->get();

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|string|max:50|unique:subjects,subject_code',
            'subject_name' => 'required|string|max:255',
            'department' => 'required|in:Account,Computer Science',
        ]);

        Subject::create($request->only(
            'subject_code',
            'subject_name',
            'department'
        ));

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_code' => 'required|string|max:50|unique:subjects,subject_code,' . $subject->id,
            'subject_name' => 'required|string|max:255',
            'department' => 'required|in:Account,Computer Science',
        ]);

        $subject->update($request->only(
            'subject_code',
            'subject_name',
            'department'
        ));

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }

    
}