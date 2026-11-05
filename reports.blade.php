
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report | Assessment Scheduling</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #321322;
        }

        
        /* ===== ADMIN SIDEBAR ===== */

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            height: 100vh;
            background: linear-gradient(180deg, #a52b55, #773049);
            color: white;
            padding: 25px 15px;
            overflow-y: auto;
        }

        .brand {
            font-size: 17px;
            font-weight: bold;
            line-height: 1.5;
            margin-bottom: 40px;
        }

        .menu-label {
            font-size: 11px;
            color: #f0cbd8;
            margin: 24px 12px 12px;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            transition: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #ffe4ed;
            color: #92264b;
            transform: none;
            margin: 0 0 8px 0;
            padding: 14px;
        }

        /* LOGOUT */

        .sidebar-logout-form {
            margin-top: 25px;
        }

        .sidebar-logout {
            display: block;
            width: 100%;
            padding: 14px;
            border: 1px solid #f0cbd8;
            border-radius: 8px;
            background: transparent;
            color: white;
            text-align: left;
            font-size: 14px;
            font-family: Arial, sans-serif;
            cursor: pointer;
        }

        .sidebar-logout:hover {
            background: #ffe4ed;
            color: #92264b;
        }


        .main {
            margin-left: 230px;
            padding: 30px;
        }

        .topbar {
            background: white;
            border: 1px solid #f4dbe5;
            padding: 18px 24px;
            border-radius: 14px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h3 {
            margin: 0 0 5px;
            font-size: 20px;
        }

        .topbar p {
            margin: 0;
            color: #876777;
            font-size: 13px;
        }

        .admin-user {
            font-size: 14px;
            font-weight: bold;
            white-space: nowrap;
        }

        .page-heading {
            margin-bottom: 22px;
        }

        .page-heading h2 {
            margin: 0 0 8px;
            font-size: 25px;
        }

        .page-heading p {
            margin: 0;
            color: #876777;
            font-size: 14px;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 13px;
            padding: 20px;
        }

        .stat-card p {
            margin: 0 0 12px;
            color: #876777;
            font-size: 13px;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 27px;
        }

        .section {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 13px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .section h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .section-description {
            color: #876777;
            font-size: 13px;
            line-height: 1.6;
            margin: 0 0 22px;
        }

        .report-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .report-card {
            border: 1px solid #f0dce5;
            border-radius: 11px;
            padding: 20px;
            background: #fffafd;
        }

        .report-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffe4ed;
            border-radius: 10px;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .report-card h4 {
            margin: 0 0 9px;
            font-size: 16px;
        }

        .report-card p {
            color: #876777;
            font-size: 13px;
            line-height: 1.6;
            min-height: 40px;
            margin: 0 0 17px;
        }

        .btn {
            display: inline-block;
            padding: 11px 15px;
            background: #b52f60;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .btn:hover {
            background: #92264b;
        }

        .btn-light {
            background: #fff0f5;
            color: #92264b;
            border: 1px solid #f0cfdb;
        }

        .btn-light:hover {
            background: #ffe4ed;
        }

        .filters {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            background: white;
            color: #321322;
            font-size: 13px;
        }

        .filter-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 13px 12px;
            background: #fff5f8;
            color: #765163;
            font-size: 12px;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f6e7ed;
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .completed {
            background: #e4f6e9;
            color: #287544;
        }

        .scheduled {
            background: #e8e9ff;
            color: #4c50a6;
        }

        .report-result {
            display: none;
            margin-top: 20px;
            padding: 18px;
            border: 1px solid #f0cfdb;
            border-radius: 10px;
            background: #fffafd;
        }

        .report-result h4 {
            margin: 0 0 12px;
        }

        .report-result p {
            color: #765163;
            font-size: 13px;
            line-height: 1.7;
        }

        .empty-message {
            color: #876777;
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .report-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .filters {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 550px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">
            🎓 ASSESSMENT<br>
            SCHEDULING<br>
            MANAGEMENT SYSTEM
        </div>

        <div class="menu-label">MAIN MENU</div>

        <a href="{{ route('admin.dashboard') }}"
        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('admin.manage-users') }}"
        class="{{ request()->routeIs('admin.manage-users*') ? 'active' : '' }}">
            👥 Manage Users
        </a>

        <a href="{{ route('admin.manage-venues') }}"
        class="{{ request()->routeIs('admin.manage-venues*') ? 'active' : '' }}">
            🏫 Manage Venues
        </a>

        <a href="{{ route('admin.manage-schedules') }}"
        class="{{ request()->routeIs('admin.manage-schedules') ? 'active' : '' }}">
            📅 View Schedules
        </a>

        <a href="{{ route('admin.subjects.index') }}"
        class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">
            📚 Manage Subjects
        </a>

        <a href="{{ route('admin.reports') }}"
        class="{{ request()->routeIs('admin.reports*') ? 'active' : '' }}">
            📊 Generate Report
        </a>

        <a href="{{ route('admin.create-notification') }}"
        class="{{ request()->routeIs('admin.create-notification*', 'admin.notifications.*') ? 'active' : '' }}">
            🔔 Create Notification
        </a>

        <div class="menu-label">ACCOUNT</div>

        <a href="{{ route('admin.profile') }}"
        class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">
            👤 Profile
        </a>

        <form action="{{ route('logout') }}"
            method="POST"
            class="sidebar-logout-form">
            @csrf

            <button type="submit" class="sidebar-logout">
                ↪ &nbsp; Logout
            </button>
        </form>

    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <strong>
                    EduScheduler
                </strong>
            </div>
            <div class="admin-user">👤 {{ auth()->user()->name }}</div>
        </div>

        <div class="page-heading">
            <h2>Reports & Analytics</h2>
            <p>Review scheduling information and prepare reports for administrative use.</p>
        </div>

        
        <div class="stats">
            <div class="stat-card">
                <p>Total Assessments</p>
                <h2>{{ $schedules->count() }}</h2>
            </div>

            <div class="stat-card">
                <p>Completed Assessments</p>
                <h2>
                    {{ $schedules->filter(function ($schedule) {
                        return strtolower($schedule->status ?? '') === 'completed';
                    })->count() }}
                </h2>
            </div>
        </div>


        
        <section class="section">
            <h3>Generate a Report</h3>

            <p class="section-description">
                Select a report type and date range to generate and download a PDF report.
            </p>

            <form action="{{ route('admin.reports.pdf') }}" method="GET">

                <div class="filters">

                    <div class="field">
                        <label for="report_type">Report Type</label>

                        <select name="report_type" id="report_type" required>
                            <option value="schedule">Assessment Schedule Report</option>
                            <option value="status">Assessment Status Report</option>
                            <option value="venue">Venue Usage Report</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date">
                    </div>

                    <div class="field">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date">
                    </div>

                </div>

                <div class="filter-actions">
                    <button type="submit" class="btn">
                        📄 Generate PDF
                    </button>

                    <a href="{{ route('admin.reports') }}"
                    class="btn btn-light"
                    style="text-decoration:none;">
                        Reset
                    </a>
                </div>

            </form>
        </section>


        
        <section class="section">
            <h3>Assessment Schedule Data</h3>
            <p class="section-description">
                Assessment records retrieved from the database.
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Assessment</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $schedule->subject_name
                                        ?? $schedule->title
                                        ?? $schedule->subject
                                        ?? 'N/A' }}
                                </td>
                                <td>
                                    {{ $schedule->date
                                        ?? $schedule->schedule_date
                                        ?? 'N/A' }}
                                </td>
                                <td>
                                    {{ $schedule->time
                                        ?? $schedule->start_time
                                        ?? 'N/A' }}
                                </td>
                                <td>{{ $schedule->venue ?? 'N/A' }}</td>
                                <td>
                                    <span class="status scheduled">
                                        {{ ucfirst($schedule->status ?? 'Scheduled') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-message">
                                    No assessment schedules found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

</body>
</html>
