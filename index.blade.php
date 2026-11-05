
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Subjects | Assessment Scheduling</title>

    
        <style>
            /* ===== GLOBAL ===== */

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

            /* Sidebar Menu */

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
                padding: 14px;
                margin: 0 0 8px 0;
            }

            /* Logout Button */

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
                transition: none;
            }

            .sidebar-logout:hover {
                background: #ffe4ed;
                color: #92264b;
            }

            /* ===== MAIN CONTENT ===== */

            .main {
                margin-left: 230px;
                padding: 30px;
                min-height: 100vh;
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

            h3 {
                font-size: 17px;
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

            /* ===== CARDS ===== */

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
                min-width: 0;
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
                margin-bottom: 22px;
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
            select,
            textarea {
                padding: 11px 12px;
                border: 1px solid #e8cbd7;
                border-radius: 8px;
                background: white;
                font-family: Arial, sans-serif;
                font-size: 13px;
                max-width: 100%;
            }

            input {
                width: 100%;
            }

            select {
                min-width: 145px;
            }

            textarea {
                width: 100%;
                resize: vertical;
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
                width: 100%;
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
                flex-wrap: wrap;
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

            /* ===== RESPONSIVE: TABLET ===== */

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

                .cards {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
            }

            /* ===== RESPONSIVE: MOBILE ===== */

            @media (max-width: 550px) {
                .sidebar {
                    position: static;
                    width: 100%;
                    height: auto;
                    padding: 20px 15px;
                }

                .brand {
                    margin-bottom: 20px;
                }

                .main {
                    margin-left: 0;
                    width: 100%;
                    padding: 18px 14px;
                }

                .topbar {
                    align-items: flex-start;
                    flex-direction: column;
                    padding: 15px;
                }

                .page-heading {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .cards {
                    grid-template-columns: 1fr;
                    gap: 12px;
                }

                .section {
                    padding: 15px;
                }

                .toolbar,
                .search-box {
                    width: 100%;
                    flex-direction: column;
                }

                input,
                select,
                textarea {
                    width: 100%;
                }

                .table-wrapper {
                    overflow-x: auto;
                }

                table {
                    min-width: 650px;
                }

                .actions {
                    flex-wrap: wrap;
                }
            }
        </style>

</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            🎓 ASSESSMENT<br>
            SCHEDULING<br>
            MANAGEMENT SYSTEM
        </div>

        <div class="menu-label">MAIN MENU</div>

        <a href="/admin/dashboards">🏠 Dashboard</a>
        <a href="/admin/manage-users">👥 Manage Users</a>
        <a href="/admin/manage-venues">🏫 Manage Venues</a>
        <a href="/admin/manage-schedules">📅 View Schedules</a>
        <a href="/admin/subjects" class="active">📚 Manage Subjects</a>
        <a href="/admin/reports">📊 Generate Report</a>
        <a href="/admin/create-notification">🔔 Create Notification</a>

        <div class="menu-label">ACCOUNT</div>

        <a href="/admin/profile">👤 Profile</a>
        <form action="{{ route('logout') }}"
            method="POST"
            class="sidebar-logout-form">
            @csrf

            <button type="submit" class="sidebar-logout">
                ↪ &nbsp; Logout
            </button>
        </form>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOPBAR -->
        <header class="topbar">

            <strong>
                EduScheduler
            </strong>

            <span>
                👤 {{ auth()->user()->name }} &nbsp; | &nbsp; Admin
            </span>

        </header>

        <!-- PAGE HEADING -->
        <div class="page-heading">

            <div>
                <h1>Manage Subjects</h1>

                <p class="muted">
                    Manage subjects according to their respective departments.
                </p>
            </div>

            <a href="{{ route('admin.subjects.create') }}" class="button">
                + Add Subject
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- VALIDATION ERRORS -->
        @if($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- SUMMARY CARDS -->
        <div class="cards">

            <div class="card">
                <div>📚 Total Subjects</div>

                <div class="number">
                    {{ $subjects->count() }}
                </div>

                <div class="muted">
                    All registered subjects
                </div>
            </div>

            <div class="card">
                <div>📊 Account Department</div>

                <div class="number">
                    {{ $subjects->where('department', 'Account')->count() }}
                </div>

                <div class="muted">
                    Account subjects
                </div>
            </div>

            <div class="card">
                <div>💻 Computer Science</div>

                <div class="number">
                    {{ $subjects->where('department', 'Computer Science')->count() }}
                </div>

                <div class="muted">
                    Computer Science subjects
                </div>
            </div>

        </div>

        <!-- SUBJECT LIST -->
        <section class="section">

            <h2>Subject List</h2>

            <p class="muted">
                Search subjects and filter by department.
            </p>

            <!-- SEARCH AND FILTER -->
            <div class="toolbar">

                <div class="search-box">

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Search subject code or name..."
                    >

                    <select id="departmentFilter">

                        <option value="all">All Departments</option>

                        <option value="account">Account</option>

                        <option value="computer science">
                            Computer Science
                        </option>

                    </select>

                </div>

            </div>

            <!-- TABLE -->
            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="subjectTable">

                        @forelse($subjects as $subject)

                            <tr data-department="{{ strtolower($subject->department) }}">

                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $subject->subject_code }}
                                </td>

                                <td>
                                    {{ $subject->subject_name }}
                                </td>

                                <td>

                                    @if($subject->department === 'Account')

                                        <span class="department account">
                                            Account
                                        </span>

                                    @else

                                        <span class="department computer-science">
                                            Computer Science
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('admin.subjects.edit', $subject->id) }}"
                                            class="button button-light"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('admin.subjects.destroy', $subject->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this subject?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="button button-danger"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" style="text-align: center;">
                                    No subjects registered yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div id="emptyMessage" class="empty-message">
                No subjects found matching your search.
            </div>

            <div class="table-footer">
                Subject records retrieved from the database.
            </div>

        </section>

    </main>

    <!-- JAVASCRIPT -->
    <script>

        const searchInput = document.getElementById('searchInput');

        const departmentFilter =
            document.getElementById('departmentFilter');

        const subjectRows =
            document.querySelectorAll('#subjectTable tr[data-department]');

        const emptyMessage =
            document.getElementById('emptyMessage');

        function filterSubjects() {

            const searchText =
                searchInput.value.toLowerCase().trim();

            const selectedDepartment =
                departmentFilter.value;

            let visibleCount = 0;

            subjectRows.forEach(function(row) {

                const rowText = row.textContent.toLowerCase();

                const rowDepartment = row.dataset.department;

                const matchesSearch =
                    rowText.includes(searchText);

                const matchesDepartment =
                    selectedDepartment === 'all' ||
                    rowDepartment === selectedDepartment;

                if (matchesSearch && matchesDepartment) {

                    row.style.display = '';
                    visibleCount++;

                } else {

                    row.style.display = 'none';

                }

            });

            emptyMessage.style.display =
                visibleCount === 0 ? 'block' : 'none';

        }

        searchInput.addEventListener('input', filterSubjects);

        departmentFilter.addEventListener('change', filterSubjects);

    </script>

</body>
</html>
