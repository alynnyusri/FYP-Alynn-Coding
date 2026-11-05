
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - EduScheduler</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
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

        .system-name {
            font-size: 15px;
            font-weight: bold;
        }

        .lecturer-name {
            white-space: nowrap;
            font-size: 14px;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        h1 {
            font-size: 28px;
            margin: 0 0 8px;
        }

        .muted {
            color: #806b77;
            font-size: 14px;
            line-height: 1.6;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border: 1px solid #f4dbe5;
            border-radius: 13px;
            box-shadow: 0 3px 12px #6b244008;
        }

        .summary-label {
            color: #806b77;
            font-size: 13px;
        }

        .summary-number {
            font-size: 29px;
            font-weight: bold;
            color: #b52f60;
            margin-top: 12px;
        }

        .notification-panel {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px #6b244008;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding: 22px 24px;
            border-bottom: 1px solid #f2e5eb;
        }

        .panel-header h2 {
            font-size: 19px;
            margin: 0;
        }

        .mark-all {
            border: none;
            background: transparent;
            color: #a52b55;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .filters {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            padding: 18px 24px;
            border-bottom: 1px solid #f2e5eb;
        }

        .filter-btn {
            padding: 9px 16px;
            border: 1px solid #efd6e0;
            border-radius: 20px;
            background: white;
            color: #762b46;
            cursor: pointer;
            font-size: 13px;
        }

        .filter-btn.active {
            background: #a52b55;
            color: white;
            border-color: #a52b55;
        }

        .notification {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 22px 24px;
            border-bottom: 1px solid #f5eaf0;
            transition: background 0.2s;
        }

        .notification:last-child {
            border-bottom: none;
        }

        .notification:hover {
            background: #fffafd;
        }

        .notification.unread {
            background: #fff8fb;
        }

        .notification-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 20px;
        }

        .icon-pink {
            background: #ffe4ed;
        }

        .icon-blue {
            background: #e6efff;
        }

        .icon-green {
            background: #e0f6e9;
        }

        .icon-orange {
            background: #fff0dc;
        }

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .notification-message {
            font-size: 13px;
            line-height: 1.7;
            color: #6f5a65;
        }

        .notification-time {
            font-size: 12px;
            color: #9a8490;
            margin-top: 10px;
        }

        .notification-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 12px;
            flex-wrap: wrap;
        }

        .read-btn {
            background: #fbe4ec;
            color: #92264b;
            border: none;
            border-radius: 7px;
            padding: 8px 11px;
            cursor: pointer;
            font-size: 12px;
        }

        .read-btn:hover {
            background: #f5d1df;
        }

        .unread-dot {
            width: 9px;
            height: 9px;
            min-width: 9px;
            border-radius: 50%;
            background: #b52f60;
            margin-top: 5px;
        }

        .empty-state {
            display: none;
            padding: 45px 20px;
            text-align: center;
            color: #806b77;
        }

        @media (max-width: 900px) {
            .summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main {
                padding: 20px;
            }

            .system-name {
                font-size: 13px;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main {
                margin-left: 0;
                padding: 15px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .notification {
                padding: 18px 14px;
                gap: 10px;
            }

            .notification-icon {
                width: 36px;
                height: 36px;
                min-width: 36px;
                font-size: 17px;
            }

            .panel-header,
            .filters {
                padding: 16px;
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

    <div class="page-heading">
        <h1>Notifications 🔔</h1>
        <p class="muted">
            Stay updated with assessment schedules and important announcements.
        </p>
    </div>

    <section class="summary">

        <div class="summary-card">
            <div class="summary-label">Total Notifications</div>
            <div class="summary-number">
                {{ $totalNotifications }}
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Assessment Reminders</div>
            <div class="summary-number">
                {{ $assessmentReminders }}
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Schedule Updates</div>
            <div class="summary-number">
                {{ $scheduleUpdates }}
            </div>
        </div>

    </section>

    <section class="notification-panel">

        <div class="panel-header">
            <h2>Recent Notifications</h2>
        </div>

        <div class="filters">

            <button class="filter-btn active"
                    data-filter="all"
                    onclick="filterNotifications('all', this)">
                All
            </button>

            <button class="filter-btn"
                    data-filter="General Announcement"
                    onclick="filterNotifications('General Announcement', this)">
                General Announcement
            </button>

            <button class="filter-btn"
                    data-filter="Assessment Reminder"
                    onclick="filterNotifications('Assessment Reminder', this)">
                Assessment Reminder
            </button>

            <button class="filter-btn"
                    data-filter="Schedule Update"
                    onclick="filterNotifications('Schedule Update', this)">
                Schedule Update
            </button>

            <button class="filter-btn"
                    data-filter="Scheduling Conflict"
                    onclick="filterNotifications('Scheduling Conflict', this)">
                Scheduling Conflict
            </button>

            <button class="filter-btn"
                    data-filter="Important Notice"
                    onclick="filterNotifications('Important Notice', this)">
                Important Notice
            </button>

        </div>

        <div id="notificationList">
            

            @forelse ($notifications as $notification)

                <article class="notification"
                        data-category="{{ $notification->category }}">

                    <div class="notification-icon icon-pink">
                        @if ($notification->category === 'Assessment Reminder')
                            ⏰
                        @elseif ($notification->category === 'Schedule Update')
                            📅
                        @elseif ($notification->category === 'Scheduling Conflict')
                            ⚠️
                        @elseif ($notification->category === 'Important Notice')
                            📢
                        @else
                            🔔
                        @endif
                    </div>

                    <div class="notification-content">

                        <div class="notification-title">
                            {{ $notification->title }}
                        </div>

                        <div class="notification-message">
                            {{ $notification->message }}
                        </div>

                        <div class="notification-time">
                            {{ \Carbon\Carbon::parse($notification->notification_date)->format('d F Y') }}
                            ·
                            {{ $notification->category }}
                        </div>

                    </div>

                    

                </article>

            @empty

                <div style="padding: 30px; text-align: center; color: #806b77;">
                    No notifications available.
                </div>

            @endforelse

            <div class="empty-state" id="emptyState" style="display: none;">
                <div style="font-size: 35px; margin-bottom: 12px;">🔔</div>

                <strong>No notifications found</strong>

                <p style="margin-top: 8px; font-size: 13px;">
                    There are no notifications in this category.
                </p>
            </div>

        </div>

    </section>

</main>

<script>
    function filterNotifications(category, button) {

    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });

    button.classList.add('active');

    const notifications = document.querySelectorAll(
        '#notificationList .notification'
    );

    let visibleCount = 0;

    notifications.forEach(item => {

        const matches = category === 'all' ||
            item.dataset.category === category;

        item.style.display = matches ? 'flex' : 'none';

        if (matches) {
            visibleCount++;
        }

    });

    document.getElementById('emptyState').style.display =
        visibleCount === 0 ? 'block' : 'none';
    }
</script>

</body>
</html>
