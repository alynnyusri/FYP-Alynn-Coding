<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
     public function index()
    {
        $venues = Venue::orderBy('venue_name')->get();

        return view('admin.manage-venues', compact('venues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'venue_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Venue::create($validated);

        return redirect()
            ->route('admin.manage-venues')
            ->with('success', 'Venue added successfully.');
    }

    
    public function edit(Venue $venue)
    {
        return view('admin.edit-venue', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $validated = $request->validate([
            'venue_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        $venue->update($validated);

        return redirect()
            ->route('admin.manage-venues')
            ->with('success', 'Venue updated successfully.');
    }

    public function toggleStatus(Venue $venue)
    {
        $venue->status = $venue->status === 'active'
            ? 'inactive'
            : 'active';

        $venue->save();

        return redirect()
            ->route('admin.manage-venues')
            ->with('success', 'Venue status updated successfully.');
    }

}
