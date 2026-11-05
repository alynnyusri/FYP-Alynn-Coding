
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Venues | Assessment Scheduling</title>

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

        /* Hover dan active: warna sahaja berubah */
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


        .menu-label {
            font-size: 11px;
            color: #f0cbd8;
            margin: 24px 12px 12px;
            letter-spacing: 1px;
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

        .topbar strong {
            font-size: 14px;
        }

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

        .button {
            display: inline-block;
            background: #b52f60;
            color: white;
            border: none;
            padding: 11px 16px;
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

        .section {
            background: white;
            border-radius: 13px;
            padding: 24px;
            border: 1px solid #f4dbe5;
            margin-bottom: 25px;
        }

        .toolbar {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin: 22px 0;
        }

        input, select {
            padding: 11px 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            background: white;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        input {
            flex: 1;
            min-width: 200px;
        }

        select {
            min-width: 150px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: #fff5f8;
            color: #806b77;
            font-size: 12px;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #f2e5eb;
        }

        td {
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 11px;
            white-space: nowrap;
        }

        .available {
            color: #087b50;
            background: #dff8ec;
        }

        .occupied {
            color: #956000;
            background: #fff0c7;
        }

        .maintenance {
            color: #a12d35;
            background: #ffe4e4;
        }

        
        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: nowrap;
        }

        .actions form {
            margin: 0;
            display: inline-flex;
            flex-shrink: 0;
        }

        .actions .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            padding: 9px 12px;
            font-size: 12px;
            min-height: 38px;
        }

        .actions button {
            padding: 9px 12px;
        }

        .actions button {
            padding: 8px 10px;
        }

        .empty-message {
            display: none;
            padding: 24px;
            text-align: center;
            color: #806b77;
        }

        .table-footer {
            margin-top: 18px;
            font-size: 12px;
            color: #806b77;
        }

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

            .toolbar {
                align-items: stretch;
                flex-direction: column;
            }

            input, select {
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

    </aside>"/admin/profile">👤 Profile</a>
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
                <h1>Manage Venues</h1>
                <p class="muted">
                    View venue details and monitor assessment venue availability.
                </p>
            </div>

            <button class="button" type="button"
                onclick="document.getElementById('addVenueForm').style.display =
                document.getElementById('addVenueForm').style.display === 'none'
                ? 'block' : 'none'">
                + Add Venue
            </button>
        </div>

        <section class="section" id="addVenueForm" style="display: none;">
            <h2>Add New Venue</h2>

            @if ($errors->any())
                <div style="color: #a12d35; margin: 15px 0;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.manage-venues.store') }}"
                method="POST"
                style="margin-top: 20px;">

                @csrf

                <div style="margin-bottom: 15px;">
                    <label for="venue_name">Venue Name</label>
                    <input type="text" id="venue_name" name="venue_name"
                        value="{{ old('venue_name') }}"
                        placeholder="e.g. Computer Lab 3" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location"
                        value="{{ old('location') }}"
                        placeholder="e.g. Block A, Level 3" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="capacity">Capacity</label>
                    <input type="number" id="capacity" name="capacity"
                        value="{{ old('capacity') }}"
                        min="1" placeholder="Number of students" required>
                </div>

                <button type="submit" class="button">Save Venue</button>

                <button type="button" class="button button-light"
                    onclick="document.getElementById('addVenueForm').style.display='none'">
                    Cancel
                </button>
            </form>
        </section>

        @if (session('success'))
            <div style="background: #dff8ec; color: #087b50;
                        padding: 14px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="cards">
            <div class="card">
                <div>🏫 Total Venues</div>
                <div class="number">{{ $venues->count() }}</div>
                <div class="muted">Registered rooms and labs</div>
            </div>

            <div class="card">
                <div>✅ Available Venues</div>
                <div class="number">
                    {{ $venues->where('status', 'active')->count() }}
                </div>
                <div class="muted">Available for booking</div>
            </div>

            <div class="card">
                <div>🕒 In Use / Unavailable</div>
                <div class="number">
                    {{ $venues->where('status', 'inactive')->count() }}
                </div>
                <div class="muted">Occupied or under maintenance</div>
            </div>
        </div>

        <section class="section">
            <h2>Venue List</h2>
            <p class="muted">
                Search venues and filter by their current status.
            </p>

            <div class="toolbar">
                <input type="text" id="searchInput"
                    placeholder="Search venue name or location...">

                <select id="statusFilter">
                    <option value="all">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Venue ID</th>
                            <th>Venue Name</th>
                            <th>Location</th>
                            <th>Capacity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="venueTable">
                        @forelse ($venues as $venue)
                            <tr data-status="{{ $venue->status }}">
                                <td>{{ $venue->id }}</td>
                                <td>{{ $venue->venue_name }}</td>
                                <td>{{ $venue->location }}</td>
                                <td>{{ $venue->capacity }} Students</td>
                                <td>
                                    <span class="status {{ $venue->status === 'active' ? 'available' : 'maintenance' }}">
                                        {{ ucfirst($venue->status) }}
                                    </span>
                                </td>
                                <td>  
                                    <div class="actions">
                                        <button class="button button-light" type="button"
                                            onclick="alert('Venue: {{ addslashes($venue->venue_name) }}\nLocation: {{ addslashes($venue->location) }}\nCapacity: {{ $venue->capacity }} students\nStatus: {{ ucfirst($venue->status) }}')">
                                            View
                                        </button>

                                        <a href="{{ route('admin.manage-venues.edit', $venue->id) }}"
                                        class="button"
                                        style="text-decoration: none;">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.manage-venues.toggle-status', $venue->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to change this venue status?');">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="button {{ $venue->status === 'active' ? 'button-light' : '' }}">
                                                {{ $venue->status === 'active' ? 'Deactivate' : 'Activate' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    No venues have been added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div id="emptyMessage" class="empty-message">
                No venues found matching your search.
            </div>

            <div class="table-footer">
                Showing sample venue records. Availability is for demonstration only.
            </div>
        </section>

    </main>

    <script>
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const venueRows = document.querySelectorAll('#venueTable tr');
        const emptyMessage = document.getElementById('emptyMessage');

        function filterVenues() {
            const searchText = searchInput.value.toLowerCase().trim();
            const selectedStatus = statusFilter.value;
            let visibleCount = 0;

            venueRows.forEach(function(row) {
                const rowText = row.textContent.toLowerCase();
                const rowStatus = row.dataset.status;

                const matchesSearch = rowText.includes(searchText);
                const matchesStatus =
                    selectedStatus === 'all' ||
                    rowStatus === selectedStatus;

                if (matchesSearch && matchesStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            emptyMessage.style.display =
                visibleCount === 0 ? 'block' : 'none';
        }

        searchInput.addEventListener('input', filterVenues);
        statusFilter.addEventListener('change', filterVenues);

        function viewVenue(id, name, location, capacity, status) {
            alert(
                'VENUE DETAILS\n\n' +
                'Venue ID: ' + id + '\n' +
                'Venue Name: ' + name + '\n' +
                'Location: ' + location + '\n' +
                'Capacity: ' + capacity + '\n' +
                'Status: ' + status
            );
        }
    </script>

</body>
</html>