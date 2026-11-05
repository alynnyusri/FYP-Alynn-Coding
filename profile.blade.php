
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - EduScheduler</title>

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

        /* Main Content */
        .main {
            margin-left: 230px;
            padding: 30px;
        }

        /* Topbar */
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

        
        .profile-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 25px;
        }

        .profile-heading h1 {
            margin: 0 0 8px;
        }

        .profile-heading .muted {
            margin: 0;
        }

        .lecturer-name {
            font-size: 16px;
            white-space: nowrap;
        }

        /* Page Heading */
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

        /* Profile Layout */
        .profile-layout {
            display: grid;
            grid-template-columns: minmax(240px, 0.8fr) minmax(0, 1.7fr);
            gap: 22px;
            align-items: start;
        }

        .card {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 3px 12px #6b244008;
            min-width: 0;
        }

        /* Profile Summary */
        .profile-summary {
            text-align: center;
        }

        .avatar {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #ffe4ed;
            font-size: 48px;
        }

        .profile-summary h2 {
            font-size: 21px;
            margin: 0 0 8px;
            color: #762b46;
        }

        .role-badge {
            display: inline-block;
            margin-top: 8px;
            padding: 7px 13px;
            border-radius: 20px;
            background: #fbe4ec;
            color: #92264b;
            font-size: 12px;
            font-weight: bold;
        }

        .profile-summary .muted {
            margin-top: 12px;
        }

        .divider {
            border: 0;
            border-top: 1px solid #f2e5eb;
            margin: 22px 0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin: 16px 0;
            font-size: 13px;
        }

        .summary-row span:first-child {
            color: #806b77;
            text-align: left;
        }

        .summary-row span:last-child {
            text-align: right;
            font-weight: bold;
        }

        /* Information Section */
        .section-title {
            font-size: 18px;
            margin: 0 0 8px;
            color: #762b46;
        }

        .section-description {
            margin-bottom: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .field label {
            font-size: 13px;
            font-weight: bold;
            color: #624453;
        }

        .field input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ead5df;
            border-radius: 8px;
            background: #fffafd;
            color: #624453;
            font-size: 14px;
            outline: none;
            cursor: default;
        }

        .field input[readonly] {
            background: #fffafd;
        }

        .full {
            grid-column: 1 / -1;
        }

        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 15px;
            margin-top: 25px;
            border-radius: 9px;
            background: #fff0f5;
            color: #762b46;
            font-size: 13px;
            line-height: 1.6;
        }

        .info-note span {
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 950px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
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
                padding: 18px;
            }

            .topbar {
                padding: 16px;
                margin-bottom: 24px;
            }

            .lecturer-name {
                font-size: 14px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
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

    </aside

    <!-- Main Content -->
    <main class="main">

        <!-- Topbar -->
        <header class="topbar">
            <strong>ASSESSMENT SCHEDULER MANAGEMENT SYSTEM</strong>
            <span>👤 {{ auth()->user()->name }} &nbsp; | &nbsp; Student</span>
        </header>

        <!-- Page Heading -->
                
        <div class="profile-heading">
            <div>
                <h1>My Profile</h1>
                <p class="muted">View your profile information.</p>
            </div>
        </div>


        <!-- Profile Content -->
        <section class="profile-layout">

            <!-- Profile Summary -->
            <article class="card profile-summary">

                <div class="avatar">🎓</div>

                <h2>{{ auth()->user()->name }}</h2>
                <p class="muted">Student</p>

                <span class="role-badge">
                    {{ ucfirst(auth()->user()->role) }}
                </span>

                <hr class="divider">

                <div class="summary-row">
                    <span>Student ID</span>
                    <span>{{ auth()->user()->login_id }}</span>
                </div>

                <div class="summary-row">
                    <span>Programme</span>
                    <span>{{ auth()->user()->course ?? 'Not provided' }}</span>
                </div>

                <div class="summary-row">
                    <span>Account Status</span>
                    <span style="color: #267849;">
                        {{ auth()->user()->status ?? 'Not provided' }}
                    </span>
                </div>

            </article>

            <!-- Personal Information -->
            <article class="card">

                <h2 class="section-title">Personal Information</h2>

                <p class="muted section-description">
                    The information below is managed by the system administrator.
                </p>

                <div class="form-grid">

                    <div class="field">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName"
                            value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <div class="field">
                        <label for="studentId">Student ID</label>
                        <input type="text" id="studentId"
                            value="{{ auth()->user()->login_id }}" readonly>
                    </div>

                    <div class="field">
                        <label for="programme">Programme</label>
                        <input type="text" id="programme"
                            value="{{ auth()->user()->course ?? 'Not provided' }}" readonly>
                    </div>

                    <div class="field">
                        <label for="semester">Semester</label>
                        <input type="text" id="semester"
                            value="{{ auth()->user()->semester ?? 'Not provided' }}" readonly>
                    </div>

                    <div class="field">
                        <label for="class">Class</label>
                        <input type="text" id="class"
                            value="{{ auth()->user()->class ?? 'Not provided' }}" readonly>
                    </div>

                </div>

                <div class="info-note">
                    <span>🔒</span>
                    <div>
                        <strong>View-only profile</strong><br>
                        Profile information cannot be edited by students.
                        Please contact the system administrator if any
                        information needs to be updated.
                    </div>
                </div>

            </article>

        </section>

    </main>

</body>
</html>
