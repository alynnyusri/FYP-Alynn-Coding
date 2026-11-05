
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | Assessment Scheduling</title>

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

        /* Main content */
        .main {
            margin-left: 230px;
            padding: 30px;
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

        h1 {
            font-size: 27px;
            margin: 0 0 8px;
        }

        h2 {
            font-size: 20px;
            margin: 0 0 12px;
        }

        p {
            line-height: 1.5;
        }

        .muted {
            color: #806b77;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            background: linear-gradient(120deg, #ffe4ed, #fff0f5, #fce7f3);
            border: 1px solid #f4cbd9;
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 28px;
            min-height: 190px;
            box-shadow: 0 4px 15px #6b244008;
        }

        .welcome h1 {
            color: #92264b;
            font-size: 28px;
            margin-bottom: 12px;
        }

        .welcome p {
            color: #806b77;
            font-size: 14px;
            margin: 0;
            line-height: 1.7;
        }

        .welcome-icon {
            font-size: 65px;
            padding: 15px;
        }

        .button {
            display: inline-block;
            background: #b52f60;
            color: white;
            border: none;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background: #92264b;
        }

        /* Summary cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin: 25px 0;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 13px;
            border: 1px solid #f4dbe5;
            box-shadow: 0 4px 15px #6b244008;
        }

        .card-label {
            font-size: 14px;
            line-height: 1.5;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            color: #b52f60;
            margin: 14px 0 8px;
        }

        .card-note {
            font-size: 13px;
            color: #806b77;
        }

        /* Content sections */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(260px, 1fr);
            gap: 22px;
            align-items: start;
        }

        .left-column,
        .right-column {
            display: grid;
            gap: 22px;
            min-width: 0;
        }

        .section {
            background: white;
            border-radius: 13px;
            padding: 24px;
            border: 1px solid #f4dbe5;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .section-heading h2 {
            margin-bottom: 8px;
        }

        .text-link {
            color: #a52b55;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
        }

        /* Assessment list */
        .assessment {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            padding: 19px 0;
            border-bottom: 1px solid #f2e5eb;
        }

        .assessment:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .assessment-title {
            font-weight: bold;
            margin-bottom: 7px;
            line-height: 1.5;
        }

        .assessment-meta {
            font-size: 13px;
            color: #806b77;
            line-height: 1.8;
        }

        .assessment-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 12px;
            flex-shrink: 0;
        }

        .status {
            display: inline-block;
            color: #087b50;
            background: #dff8ec;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            white-space: nowrap;
        }

        .status.soon {
            color: #986000;
            background: #fff0cc;
        }

        /* Class information */
        .class-card {
            background: #fff5f8;
            border: 1px solid #f4dbe5;
            border-radius: 10px;
            padding: 18px;
            margin-top: 15px;
        }

        .class-name {
            font-weight: bold;
            margin-bottom: 12px;
        }

        .class-details {
            color: #806b77;
            font-size: 14px;
            line-height: 1.9;
        }

        /* Notifications */
        .notification {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 17px 0;
            border-bottom: 1px solid #f2e5eb;
        }

        .notification:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .notification-icon {
            width: 38px;
            height: 38px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff0f5;
            border-radius: 9px;
            flex-shrink: 0;
        }

        .notification-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .notification-text {
            color: #806b77;
            font-size: 13px;
            line-height: 1.6;
        }

        /* Quick access */
        .quick-actions {
            display: grid;
            gap: 12px;
            margin-top: 15px;
        }

        .action-link {
            display: block;
            padding: 14px;
            border: 1px solid #f0d5e0;
            border-radius: 9px;
            text-decoration: none;
            color: #773049;
            font-size: 14px;
        }

        .action-link:hover {
            background: #fff0f5;
            border-color: #d99bb3;
        }

        .footer {
            text-align: center;
            color: #806b77;
            font-size: 12px;
            margin-top: 30px;
            padding: 15px 0;
        }

        /* Responsive layout */
        @media (max-width: 1100px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 18px;
            }

            .topbar {
                padding: 16px;
            }
        }

        @media (max-width: 550px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
                padding: 18px 15px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .sidebar a {
                padding: 11px;
                margin-bottom: 5px;
            }

            .main {
                margin-left: 0;
                padding: 16px;
            }

            .cards {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .assessment {
                flex-direction: column;
            }

            .assessment-actions {
                align-items: flex-start;
            }

            .section {
                padding: 18px;
            }

            h1 {
                font-size: 23px;
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

        <!-- Summary cards -->
        <div class="welcome">

            <div>
                <span style="
                    background: #fbe4ec;
                    color: #92264b;
                    padding: 7px 13px;
                    border-radius: 20px;
                    font-size: 12px;
                    font-weight: bold;
                ">
                    🎓 STUDENT DASHBOARD
                </span>

                <h1 style="margin-top: 18px;">
                    Welcome back, {{ auth()->user()->name }}!
                </h1>

                <p>
                    Stay organized and keep track of your upcoming assessments.
                    Check your schedule and stay updated with the latest announcements.
                </p>
            </div>

            <div class="welcome-icon">
                📚
            </div>

        </div>

        <!-- Main content -->
        <div class="content-grid">

            <div class="left-column">

                <!-- Upcoming assessments -->
                <section class="section">

                    <div class="section-heading">
                        <h2>Upcoming Assessments</h2>
                        <a href="/student/schedule" class="text-link">
                            View all →
                        </a>
                    </div>

                    <p class="muted">
                        Your upcoming tests, quizzes and examinations.
                    </p>
                    
                    @forelse ($upcomingAssessments as $assessment)

                        <div class="assessment">

                            <div>
                                <div class="assessment-title">
                                    {{ $assessment->subject }}
                                </div>

                                <div class="assessment-meta">
                                    {{ $assessment->assessment_type }}
                                    ·
                                    {{ $assessment->class }}
                                    <br>

                                    {{ \Carbon\Carbon::parse($assessment->date)->format('d F Y') }}
                                    ·
                                    {{ \Carbon\Carbon::parse($assessment->start_time)->format('h:i A') }}
                                    –
                                    {{ \Carbon\Carbon::parse($assessment->start_time)->addMinutes((int) $assessment->duration)->format('h:i A') }}
                                    <br>

                                    {{ $assessment->venue }}
                                </div>
                            </div>

                            <div class="assessment-actions">

                                <span class="status">
                                    {{ ucfirst($assessment->status) }}
                                </span>

                            </div>

                        </div>

                    @empty

                        <div class="empty-message">
                            <p>No upcoming assessments for your class.</p>
                        </div>

                    @endforelse

                </section>

                <!-- Class information -->
                <section class="section">

                    <h2>My Class Information</h2>
                    <p class="muted">
                        Your current class and academic details.
                    </p>

                    <div class="class-card">
                        <div class="class-name">
                            {{ auth()->user()->course ?? 'Course not available' }}
                        </div>

                        <div class="class-details">
                            Class: {{ auth()->user()->class ?? 'Not assigned' }}<br>
                            Semester: {{ auth()->user()->semester ?? 'Not assigned' }}<br>
                            Academic Session: 2026/2027
                        </div>
                    </div>

                </section>

            </div>

            <div class="right-column">

                <!-- Recent notifications -->
                <section class="section">

                    <div class="section-heading">
                        <h2>Recent Notifications 🔔</h2>

                        <a href="/student/notifications" class="text-link">
                            View all →
                        </a>
                    </div>

                    <p class="muted">
                        Stay updated with the latest announcements and assessment updates.
                    </p>

                    @forelse ($recentNotifications as $notification)

                    <div class="notification">

                        <div class="notification-icon">
                            🔔
                        </div>

                        <div>
                            <div class="notification-title">
                                {{ $notification->title }}
                            </div>

                            <div class="notification-text">
                                {{ $notification->message }}
                            </div>

                            <small class="muted">
                                {{ \Carbon\Carbon::parse($notification->notification_date)->format('d F Y') }}
                            </small>
                        </div>

                    </div>

                @empty

                    <p class="muted">No notifications available.</p>

                @endforelse

                </section>
            </div>

        </div>

        <footer class="footer">
            Assessment Scheduling Management System © 2026
        </footer>

    </main>

</body>
</html>
