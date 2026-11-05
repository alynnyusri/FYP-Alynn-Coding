
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Schedule | EduScheduler</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fff5f7;
            color: #382832;
        }

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

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            background: white;
            padding: 18px 24px;
            border-radius: 14px;
            margin-bottom: 28px;
            border: 1px solid #f4dbe5;
            min-height: 72px;
        }

        .topbar strong {
            font-size: 17px;
            font-weight: 600;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
        }

        .user-icon {
            color: #773049;
        }

        .topbar-divider {
            color: #806b77;
        }


        .subtitle {
            font-size: 12px;
            color: #f2dce4;
            margin: 0 0 35px 10px;
        }

        .nav-link {
            display: block;
            color: #f8eaf0;
            text-decoration: none;
            padding: 13px 14px;
            margin-bottom: 8px;
            border-radius: 8px;
            font-size: 14px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #9b526d;
            color: white;
        }

        .main {
            margin-left: 235px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .topbar > div:first-child {
            text-align: left;
        }

        .topbar > div:first-child h1 {
            text-align: left;
        }

        .topbar > div:first-child p {
            color: #8c7480;
            font-size: 14px;
            margin-top: 7px;
            text-align: left;
        }

        .student-label {
            background: white;
            border: 1px solid #f0dce3;
            padding: 11px 16px;
            border-radius: 10px;
            color: #762b46;
            font-size: 13px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            border: 1px solid #f0dce3;
            box-shadow: 0 3px 10px #762b4608;
        }

        .card p {
            color: #8c7480;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .card h2 {
            color: #762b46;
            font-size: 27px;
        }

        .section {
            background: white;
            border: 1px solid #f0dce3;
            border-radius: 12px;
            padding: 23px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-heading p {
            color: #8c7480;
            font-size: 13px;
            margin-top: 7px;
        }

        .section-heading > div {
            text-align: left;
        }

        .section-heading p {
            text-align: left;
            margin-left: 0;
        }

        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input, select {
            padding: 11px 12px;
            border: 1px solid #e6ccd6;
            border-radius: 8px;
            outline: none;
            background: white;
            font-size: 13px;
            min-width: 0;
        }

        input {
            flex: 1;
        }

        input:focus, select:focus {
            border-color: #9b526d;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #fff5f7;
            color: #762b46;
            text-align: left;
            padding: 14px 12px;
            font-size: 12px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #f3e8ec;
            font-size: 13px;
        }

        .subject {
            font-weight: bold;
            color: #4b3440;
        }

        .muted {
            color: #8c7480;
            font-size: 12px;
            margin-top: 5px;
        }

        .badge {
            display: inline-block;
            background: #f8e6ed;
            color: #762b46;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            white-space: nowrap;
        }

        .empty {
            display: none;
            text-align: center;
            padding: 30px;
            color: #8c7480;
        }

        .footer-note {
            color: #8c7480;
            font-size: 12px;
            margin-top: 18px;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                padding: 18px;
            }

            .subtitle {
                margin-bottom: 15px;
            }

            .nav-link {
                display: inline-block;
                margin-bottom: 4px;
            }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .filters {
                flex-direction: column;
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

        <a href="/student/dashboards"
        class="{{ request()->is('student/dashboards*') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="/student/schedule"
        class="{{ request()->is('student/schedule*') ? 'active' : '' }}">
            📝 My Schedule
        </a>

        <a href="/student/notifications"
        class="{{ request()->is('student/notifications*') ? 'active' : '' }}">
            🔔 Notifications
        </a>

        <div class="menu-label">ACCOUNT</div>

        <a href="/student/profile"
        class="{{ request()->is('student/profile*') ? 'active' : '' }}">
            👤 Profile
        </a>

        <form action="{{ route('logout') }}" method="POST"
            class="sidebar-logout-form"
            onsubmit="return confirm('Are you sure you want to log out?')">
            @csrf

            <button type="submit" class="sidebar-logout">
                ↪ &nbsp; Logout
            </button>
        </form>

    </aside>


    <main class="main">
        
        <header class="topbar">
            <strong>EduScheduler</strong>
            <span>👤 {{ auth()->user()->name }} &nbsp; | &nbsp; Student</span>
        </header>

        <header class="topbar">
            <div>
                <h1>My Assessment Schedule</h1>
                <p>View your upcoming tests and assessments.</p>
            </div>

        </header>

        <section class="summary">
            <div class="card">
                <p>Total Assessments</p>
                <h2 id="totalCount">{{ $totalAssessments }}</h2>
            </div>

            <div class="card">
                <p>Upcoming Assessments</p>
                <h2 id="upcomingCount">{{ $upcomingCount }}</h2>
            </div>

            <div class="card">
                <p>Assessment Venues</p>
                <h2 id="venueCount">{{ $venueCount }}</h2>
            </div>
        </section>

        <section class="section">
            <div class="section-heading">
                <div>
                    <h2>Assessment List</h2>
                    <p>Check the date, time, venue and lecturer for each assessment.</p>
                </div>
            </div>

            <div class="filters">
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search subject, lecturer or venue..."
                    aria-label="Search assessments"
                >

                <select id="typeFilter" aria-label="Filter assessment type">
                    <option value="">All assessment types</option>
                    <option value="Test">Test</option>
                    <option value="Quiz">Quiz</option>
                    <option value="Presentation">Presentation</option>
                    <option value="Practical">Practical</option>
                </select>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Lecturer</th>
                        </tr>
                    </thead>

                    <tbody id="scheduleBody">

                        @forelse ($assessments as $assessment)

                            <tr data-type="{{ $assessment->assessment_type }}">

                                <td>
                                    <div class="subject">
                                        {{ $assessment->subject }}
                                    </div>

                                    <div class="muted">
                                        {{ $assessment->class }}
                                    </div>
                                </td>

                                <td>
                                    <span class="badge">
                                        {{ $assessment->assessment_type }}
                                    </span>
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($assessment->date)->format('d F Y') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($assessment->start_time)->format('h:i A') }}
                                    –
                                    {{ \Carbon\Carbon::parse($assessment->start_time)
                                        ->addMinutes((int) $assessment->duration)
                                        ->format('h:i A') }}
                                </td>

                                <td>
                                    {{ $assessment->venue }}
                                </td>

                                <td>
                                    {{ $assessment->lecturer?->name ?? 'Not available' }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" style="text-align:center; padding:25px;">
                                    No assessments available for your class.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

                <div class="empty" id="emptyMessage">
                    No assessments match your search.
                </div>
            </div>
        </section>
    </main>

    <script>
        const searchInput = document.getElementById('searchInput');
        const typeFilter = document.getElementById('typeFilter');
        const rows = [...document.querySelectorAll('#scheduleBody tr')];

        function filterSchedule() {
            const keyword = searchInput.value.toLowerCase().trim();
            const selectedType = typeFilter.value;
            let visibleCount = 0;

            rows.forEach(row => {
                const matchesText = row.textContent.toLowerCase().includes(keyword);
                const matchesType = !selectedType || row.dataset.type === selectedType;
                const visible = matchesText && matchesType;

                row.style.display = visible ? '' : 'none';

                if (visible) visibleCount++;
            });

            document.getElementById('emptyMessage').style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        searchInput.addEventListener('input', filterSchedule);
        typeFilter.addEventListener('change', filterSchedule);
    </script>
</body>
</html>
