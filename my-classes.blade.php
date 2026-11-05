
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Classes - EduScheduler</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            margin-bottom: 40px;
        }

        .page-heading h1 {
            font-size: 27px;
            color: #321322;
            margin-bottom: 8px;
        }

        .page-heading .muted {
            color: #806b77;
            margin-top: 0;
            font-size: 14px;
        }

        .muted {
            color: #777;
            margin-top: 6px;
            font-size: 14px;
        }

        .classes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 12px #762b4610;
            border: 1px solid #f1dce3;
        }

        .card h3 {
            color: #762b46;
            margin-bottom: 12px;
        }

        .badge {
            display: inline-block;
            background: #e0f6e9;
            color: #267849;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .details {
            margin: 18px 0;
            line-height: 1.9;
            font-size: 14px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 10px 12px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .primary {
            background: #b52f60;
            color: white;
        }

        .secondary {
            background: #fbe4ec;
            color: #762b46;
        }

        .btn:hover {
            opacity: 0.85;
        }

       @media (max-width: 900px) {
            .sidebar {
                width: 180px;
            }

            .main {
                margin-left: 180px;
                padding: 18px;
            }
        }

        @media (max-width: 550px) {
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

        <a href="/lecturer/dashboards"
        class="{{ request()->is('lecturer/dashboards*') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="/lecturer/schedule"
        class="{{ request()->is('lecturer/schedule*') ? 'active' : '' }}">
            📅 Schedule
        </a>

        <a href="/lecturer/create-assessment"
        class="{{ request()->is('lecturer/create-assessment*') ? 'active' : '' }}">
            📝 Create Assessment
        </a>

        <a href="/lecturer/my-classes"
        class="{{ request()->is('lecturer/my-classes*') ? 'active' : '' }}">
            👥 My Classes
        </a>

        <a href="/lecturer/notifications"
        class="{{ request()->is('lecturer/notifications*') ? 'active' : '' }}">
            🔔 Notifications
        </a>

        <div class="menu-label">ACCOUNT</div>

        <a href="/lecturer/profile"
        class="{{ request()->is('lecturer/profile*') ? 'active' : '' }}">
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

        <div class="topbar">
            <strong>
                EduScheduler
            </strong>

            <div class="admin-user">
                👤 {{ auth()->user()->name }} &nbsp; | &nbsp; Lecturer
            </div>

        </div>

       
        <div class="page-heading">
            <h1>My Classes</h1>
            <p class="muted">
                Manage your classes and assessment schedules.
            </p>
        </div>

    <section class="classes">
        @forelse ($classes as $className => $classSchedules)
            <article class="card">
                <span class="badge">Active</span>

                <h3 style="margin-top: 15px;">
                    {{ $className }}
                </h3>

                <p><strong>Subjects:</strong></p>

                <div class="details">
                    @foreach ($classSchedules->pluck('subject')->unique() as $subject)
                        <p>📚 {{ $subject }}</p>
                    @endforeach

                    <p>
                        📝 Total Assessments:
                        {{ $classSchedules->count() }}
                    </p>
                </div>

                <div class="actions">
                    <a class="btn primary"
                    href="{{ route('lecturer.manage-schedule') }}">
                        Manage Schedules
                    </a>

                    <a class="btn secondary"
                    href="{{ route('lecturer.schedule') }}">
                        View Calendar
                    </a>
                </div>
            </article>
        @empty
            <article class="card">
                <h3>No Classes Yet</h3>

                <p class="muted">
                    No assessment schedules have been created
                    for your account yet.
                </p>

                <div class="actions" style="margin-top: 18px;">
                    <a class="btn primary"
                    href="{{ url('/lecturer/create-assessment') }}">
                        Create Assessment
                    </a>
                </div>
            </article>
        @endforelse
    </section>
    </main>
</body>
</html>
