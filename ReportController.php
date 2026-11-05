<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Schedule;

class ReportController extends Controller
{
    public function index()
    {
        $schedules = Schedule::latest()->get();

        return view('admin.reports', compact('schedules'));
    }

    public function generatePdf(Request $request)
    {
        // Validate filter inputs
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'report_type' => [
                'nullable',
                'in:schedule,conflict,venue,status'
            ],
        ]);

        $query = Schedule::with('lecturer:id,name');

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;
        $reportType = $validated['report_type'] ?? 'schedule';

        // Filter by date range
        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        // Filter by report type
        if ($reportType === 'conflict') {
            $query->where('status', 'conflict');
        } elseif ($reportType === 'status') {
            $query->whereIn('status', [
                'completed',
                'scheduled',
                'conflict',
            ]);
        }

        if ($reportType === 'venue') {
            $query->orderBy('venue');
        } else {
            $query->latest();
        }

        $schedules = $query->get();

        $reportTitle = [
            'schedule' => 'Assessment Schedule Report',
            'conflict' => 'Scheduling Conflict Report',
            'venue' => 'Venue Usage Report',
            'status' => 'Assessment Status Report',
        ][$reportType];

        $pdf = Pdf::loadView('admin.report-pdf', [
            'schedules' => $schedules,
            'reportTitle' => $reportTitle,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'reportType' => $reportType,
        ])->setPaper('a4', 'landscape');

        return $pdf->download(
            'assessment-' . $reportType . '-report.pdf'
        );
    }
}
