
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedule | Assessment Scheduling</title>

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
            padding: 18px;
            border-radius: 14px;
            margin-bottom: 25px;

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;

            min-height: 55px;
        }

        .topbar strong {
            font-size: 12px;
            font-weight: bold;
            color: #321322;
        }

        .admin-user {
            font-size: 12px;
            font-weight: normal;
            color: #321322;
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
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
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

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-header h3 {
            margin: 0;
            font-size: 18px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        input, select {
            padding: 11px 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            font-size: 13px;
            background: white;
            color: #321322;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #b52f60;
        }

        .search {
            flex: 1;
            min-width: 180px;
        }

        .btn {
            display: inline-block;
            padding: 11px 15px;
            background: #b52f60;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
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

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th {
            text-align: left;
            padding: 13px 12px;
            background: #fff5f8;
            color: #765163;
            font-size: 12px;
            font-weight: bold;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f6e7ed;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #fffafd;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .scheduled {
            background: #e4f6e9;
            color: #287544;
        }

        .completed {
            background: #e8e9ff;
            color: #4c50a6;
        }

        .pending {
            background: #fff0d7;
            color: #99610a;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .action-buttons button {
            padding: 7px 9px;
            border-radius: 6px;
            border: 1px solid #edcfdb;
            background: #fff5f8;
            color: #92264b;
            cursor: pointer;
            font-size: 12px;
        }

        .action-buttons button:hover {
            background: #ffe4ed;
        }

        .notice {
            background: #fff0f3;
            border: 1px solid #f1c9d7;
            border-radius: 10px;
            padding: 15px 17px;
            color: #78344d;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .empty-message {
            text-align: center;
            color: #876777;
            padding: 25px;
        }

        @media (max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

                <strong>
                    EduScheduler
                </strong>

                <div class="admin-user">
                    👤 System Admin &nbsp; | &nbsp; Admin
                </div>
        </div>

        <div class="page-heading">
            <h2>Assessment Schedule Overview</h2>
            <p>View and monitor assessment schedules, lecturer bookings and venue usage.</p>
        </div>

        <div class="stats">

            <div class="stat-card">
                <p>Total Assessments</p>
                <h2>{{ $totalSchedules }}</h2>
            </div>

            <div class="stat-card">
                <p>Scheduled</p>
                <h2>{{ $scheduledCount }}</h2>
            </div>

            <div class="stat-card">
                <p>Total Venues</p>
                <h2>{{ $venues->count() }}</h2>
            </div>

            <div class="stat-card">
                <p>Completed</p>
                <h2>{{ $completedCount }}</h2>
            </div>

        </div>

        <section class="section">
            <div class="section-header">
                <h3>Assessment Schedules</h3>
            </div>

            <div class="filters">
                <input
                    type="text"
                    id="searchInput"
                    class="search"
                    placeholder="Search subject, lecturer, venue or class..."
                    oninput="filterSchedules()"
                >

                <select id="statusFilter" onchange="filterSchedules()">
                    <option value="">All Status</option>
                    <option value="pending">Scheduled</option>
                    <option value="completed">Completed</option>
                </select>

                <select id="venueFilter" onchange="filterSchedules()">
                    <option value="">All Venues</option>

                    @foreach ($venues as $venue)
                        <option value="{{ $venue->venue_name }}">
                            {{ $venue->venue_name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="table-wrapper">
                <table id="scheduleTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject / Assessment</th>
                            <th>Lecturer</th>
                            <th>Class</th>
                            <th>Date & Time</th>
                            <th>Venue</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($schedules as $schedule)

                            @php
                                $startTime = \Carbon\Carbon::parse($schedule->start_time);
                                $endTime = $startTime->copy()->addMinutes($schedule->duration);

                                $statusLabel = $schedule->status === 'pending'
                                    ? 'Scheduled'
                                    : ucfirst($schedule->status);

                                $statusClass = $schedule->status === 'pending'
                                    ? 'scheduled'
                                    : $schedule->status;
                            @endphp

                            <tr data-status="{{ $schedule->status }}"
                                data-venue="{{ $schedule->venue }}">

                                <td>{{ $schedule->id }}</td>

                                <td>
                                    {{ $schedule->subject }}
                                    <br>
                                    <small>{{ $schedule->assessment_type }}</small>
                                </td>

                                <td>
                                    {{ $schedule->lecturer?->name ?? 'N/A' }}
                                </td>

                                <td>{{ $schedule->class }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                                    <br>
                                    {{ $startTime->format('h:i A') }}
                                    – {{ $endTime->format('h:i A') }}
                                </td>

                                <td>{{ $schedule->venue }}</td>

                                <td>
                                    <span class="status {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <button onclick="viewSchedule(this)">
                                            View
                                        </button>
                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-message">
                                    No assessment schedules available.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

                <p id="emptyMessage" class="empty-message" style="display:none;">
                    No matching schedules found.
                </p>
            </div>
        </section>

    </main>

    <script>
        function filterSchedules() {
            const search = document.getElementById('searchInput')
                .value.toLowerCase();

            const status = document.getElementById('statusFilter').value;
            const venue = document.getElementById('venueFilter').value;
            const rows = document.querySelectorAll('#scheduleTable tbody tr');

            let visibleCount = 0;

            rows.forEach(function(row) {
                const text = row.innerText.toLowerCase();
                const rowStatus = row.dataset.status;
                const rowVenue = row.dataset.venue;

                const matchesSearch = text.includes(search);
                const matchesStatus = !status || rowStatus === status;
                const matchesVenue = !venue || rowVenue === venue;

                const show = matchesSearch && matchesStatus && matchesVenue;

                row.style.display = show ? '' : 'none';

                if (show) visibleCount++;
            });

            document.getElementById('emptyMessage').style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        function showDemo(action) {
            alert(action + ' is a demo feature. Database functionality will be added later.');
        }

        function viewSchedule(button) {
            const row = button.closest('tr');
            const cells = row.querySelectorAll('td');

            alert(
                'Assessment Details\n\n' +
                'ID: ' + cells[0].innerText + '\n' +
                'Assessment: ' + cells[1].innerText + '\n' +
                'Lecturer: ' + cells[2].innerText + '\n' +
                'Class: ' + cells[3].innerText + '\n' +
                'Date & Time: ' + cells[4].innerText.replace('\n', ' ') + '\n' +
                'Venue: ' + cells[5].innerText + '\n' +
                'Status: ' + cells[6].innerText
            );
        }
    </script>

</body>
</html>
