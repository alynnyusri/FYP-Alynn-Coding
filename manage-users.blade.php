
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users | Assessment Scheduling</title>

    
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

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #ffe4ed;
            color: #92264b;
        }

        .menu-label {
            font-size: 11px;
            color: #f0cbd8;
            margin: 24px 12px 12px;
            letter-spacing: 1px;
        }

        /* Logout button */

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
            transition: background 0.2s ease;
        }

        .sidebar-logout:hover {
            background: #ffe4ed;
            color: #92264b;
        }

        /* ===== MAIN CONTENT ===== */

        .main {
            margin-left: 230px;
            padding: 30px;
        }

        /* ===== TOPBAR ===== */

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
            font-size: 14px;
        }

        /* ===== HEADINGS ===== */

        h1 {
            font-size: 27px;
            margin: 0 0 8px;
        }

        h2 {
            font-size: 19px;
            margin: 0;
        }

        .muted {
            color: #806b77;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* ===== DASHBOARD CARDS ===== */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
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

        .number {
            font-size: 29px;
            font-weight: bold;
            color: #b52f60;
            margin: 14px 0 8px;
        }

        /* ===== SECTION ===== */

        .section {
            background: white;
            border-radius: 13px;
            padding: 24px;
            border: 1px solid #f4dbe5;
        }

        /* ===== TOOLBAR ===== */

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin: 22px 0;
        }

        .search-box {
            display: flex;
            gap: 10px;
            flex: 1;
            min-width: 220px;
        }

        /* ===== INPUT AND SELECT ===== */

        input,
        select {
            padding: 11px 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            background: white;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        input {
            width: 100%;
        }

        select {
            min-width: 145px;
        }

        /* ===== BUTTONS ===== */

        .button {
            display: inline-block;
            background: #b52f60;
            color: white;
            border: none;
            padding: 11px 15px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .button:hover {
            background: #92264b;
        }

        .button-light {
            background: #fce7f0;
            color: #92264b;
        }

        .button-light:hover {
            background: #f7d3e1;
        }

        /* ===== TABLE ===== */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #fff5f8;
            color: #806b77;
            font-size: 12px;
            font-weight: bold;
        }

        th,
        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f2e5eb;
        }

        td {
            font-size: 13px;
        }

        /* ===== ROLE BADGES ===== */

        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .lecturer {
            color: #7545a0;
            background: #f0e5fb;
        }

        .student {
            color: #2468a0;
            background: #e2f1ff;
        }

        .admin {
            color: #92264b;
            background: #ffe4ed;
        }

        /* ===== ACCOUNT STATUS ===== */

        .account-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .account-status.active {
            background: #e5f7eb;
            color: #218548;
        }

        .account-status.inactive {
            background: #fde8e8;
            color: #c62828;
        }

        /* ===== ACTIONS ===== */

        .actions {
            display: flex;
            gap: 6px;
        }

        .actions .button {
            padding: 8px 10px;
        }

        /* ===== EMPTY MESSAGE ===== */

        .empty-message {
            display: none;
            text-align: center;
            padding: 25px;
            color: #806b77;
            font-size: 14px;
        }

        .table-footer {
            color: #806b77;
            font-size: 12px;
            margin-top: 18px;
        }

        /* ===== RESPONSIVE DESIGN ===== */

        @media (max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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
                padding: 18px 14px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .toolbar,
            .search-box {
                width: 100%;
                flex-direction: column;
            }

            select {
                width: 100%;
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

        <header class="topbar">
            <strong>
                EduScheduler
            </strong>
            <span>👤 {{ auth()->user()->name }} &nbsp; | &nbsp; Admin</span>
        </header>

        <div class="page-heading">
            <div>
                <h1>Manage Users</h1>
                <p class="muted">
                    View and manage lecturer and student accounts.
                </p>
            </div>

            <a href="{{ route('admin.manage-users.create') }}"
                class="button"
                style="text-decoration: none; display: inline-block;">
                + Add User
            </a>
        </div>

        <div class="cards">
            <div class="card">
                <div>👥 Total Users</div>
                <div class="number">{{ $totalUsers }}</div>
                <div class="muted">All registered accounts</div>
            </div>

            <div class="card">
                <div>👨‍🏫 Lecturers</div>
                <div class="number">{{ $totalLecturers }}</div>
                <div class="muted">Registered lecturers</div>
            </div>

            <div class="card">
                <div>🎓 Students</div>
                <div class="number">{{ $totalStudents }}</div>
                <div class="muted">Registered students</div>
            </div>
        </div>

        <section class="section">
            <h2>User List</h2>
            <p class="muted">
                Search for users and filter accounts by role.
            </p>

            <div class="toolbar">
                <div class="search-box">
                    <input type="text" id="searchInput"
                           placeholder="Search name, ID or email...">

                    <select id="roleFilter">
                        <option value="all">All Roles</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="student">Student</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Course / Semester
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="userTable">
                        @forelse ($users as $user)
                            <tr data-role="{{ $user->role }}">
                                <td>{{ $user->login_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    {{ $user->course ?: '—' }}
                                    @if ($user->semester)
                                        (Semester {{ $user->semester }})
                                    @endif
                                </td>
                                <td>
                                    <span class="role {{ $user->role }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="account-status {{ $user->status }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">
                                        <button
                                            class="button button-light"
                                            type="button"
                                            onclick="viewUser(
                                                @js($user->name),
                                                @js($user->login_id),
                                                @js($user->role),
                                                @js($user->status)
                                            )">
                                            View
                                        </button>
                                        <a href="{{ route('admin.manage-users.edit', $user->id) }}"
                                            class="button button-light"
                                            style="text-decoration: none;">
                                                Edit
                                        </a>
                                        <form method="POST"
                                                action="{{ route('admin.manage-users.status', $user->id) }}"
                                                onsubmit="return confirm('Are you sure you want to change this user status?')">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="button button-light">
                                                {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">
                                    No users registered yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody> 
                </table>
            </div>

            <div id="emptyMessage" class="empty-message">
                No users found matching your search.
            </div>

            <div class="table-footer">
                User accounts retrieved from the database.
            </div>
        </section>

    </main>

    <script>
        const searchInput = document.getElementById('searchInput');
        const roleFilter = document.getElementById('roleFilter');
        const userRows = document.querySelectorAll('#userTable tr');
        const emptyMessage = document.getElementById('emptyMessage');

        function filterUsers() {
            const searchText = searchInput.value.toLowerCase().trim();
            const selectedRole = roleFilter.value;
            let visibleCount = 0;

            userRows.forEach(function(row) {
                const rowText = row.textContent.toLowerCase();
                const rowRole = row.dataset.role;

                const matchesSearch = rowText.includes(searchText);
                const matchesRole =
                    selectedRole === 'all' || rowRole === selectedRole;

                if (matchesSearch && matchesRole) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            emptyMessage.style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        searchInput.addEventListener('input', filterUsers);
        roleFilter.addEventListener('change', filterUsers);

        function viewUser(name, id, role, status) {
            alert(
                'USER DETAILS\n\n' +
                'Name: ' + name + '\n' +
                'User ID: ' + id + '\n' +
                'Role: ' + role + '\n' +
                'Status: ' + status
             );
        }

        function editUser(id) {
            alert('Edit User: ' + id +
                '\n\nThe edit function will be implemented later.');
        }
    </script>

</body>
</html>
