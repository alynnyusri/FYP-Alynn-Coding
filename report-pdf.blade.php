
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $reportTitle ?? 'Assessment Report' }}</title>

    <style>
        @page {
            margin: 30px 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #321322;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #c04f83;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        h1 {
            color: #a52b55;
            font-size: 19px;
            margin: 0 0 8px;
        }

        h2 {
            color: #c04f83;
            font-size: 14px;
            margin: 0 0 8px;
        }

        .meta {
            font-size: 9px;
            color: #765163;
            line-height: 1.7;
        }

        .summary {
            margin: 15px 0;
            padding: 10px;
            background: #fff0f5;
            border: 1px solid #f0cfdb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        thead {
            display: table-header-group;
        }

        tr {
            page-break-inside: avoid;
        }

        th {
            background: #f8d7e5;
            color: #762443;
            font-weight: bold;
            text-align: left;
        }

        th, td {
            border: 1px solid #e5cbd5;
            padding: 8px 6px;
            vertical-align: top;
        }

        td {
            font-size: 9px;
        }

        .center {
            text-align: center;
        }

        .status {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 8px;
            color: #876777;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>ASSESSMENT SCHEDULING</h1>
        <h1>MANAGEMENT SYSTEM</h1>
        <h2>{{ $reportTitle ?? 'Assessment Schedule Report' }}</h2>

        <div class="meta">
            Generated on: {{ now()->format('d/m/Y h:i A') }}<br>

            Date Range:
            {{ !empty($startDate) ? \Carbon\Carbon::parse($startDate)->format('d/m/Y') : 'All dates' }}
            -
            {{ !empty($endDate) ? \Carbon\Carbon::parse($endDate)->format('d/m/Y') : 'All dates' }}
        </div>
    </div>

    <div class="summary">
        <strong>Total Records:</strong> {{ $schedules->count() }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No.</th>
                <th style="width: 17%;">Subject</th>
                <th style="width: 12%;">Type</th>
                <th style="width: 9%;">Class</th>
                <th style="width: 14%;">Lecturer</th>
                <th style="width: 11%;">Date</th>
                <th style="width: 10%;">Time</th>
                <th style="width: 13%;">Venue</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($schedules as $schedule)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>

                    <td>{{ $schedule->subject ?? 'N/A' }}</td>

                    <td>{{ $schedule->assessment_type ?? 'N/A' }}</td>

                    <td>{{ $schedule->class ?? 'N/A' }}</td>

                    <td>{{ $schedule->lecturer?->name ?? 'N/A' }}</td>

                    <td>
                        {{ $schedule->date
                            ? \Carbon\Carbon::parse($schedule->date)->format('d/m/Y')
                            : 'N/A' }}
                    </td>

                    <td>{{ $schedule->start_time ?? 'N/A' }}</td>

                    <td>{{ $schedule->venue ?? 'N/A' }}</td>

                    <td class="status">
                        {{ ucfirst($schedule->status ?? 'N/A') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="center">
                        No assessment schedules found for the selected filters.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Assessment Scheduling Management System |
        Confidential Administrative Report
    </div>
</body>
</html>
