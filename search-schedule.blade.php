
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Assessment | EduScheduler</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff5f7;
            color: #432b36;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: #762b46;
            color: white;
            padding: 28px 18px;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
        }

        .subtitle {
            color: #f3dce5;
            font-size: 12px;
            margin: 8px 0 35px;
        }

        .nav-title {
            color: #e8bdcc;
            font-size: 11px;
            text-transform: uppercase;
            margin: 25px 10px 12px;
        }

        .nav-link {
            display: block;
            color: #fbeef2;
            text-decoration: none;
            padding: 13px 12px;
            border-radius: 9px;
            margin-bottom: 7px;
            font-size: 14px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #a94f70;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            padding: 20px 35px;
            border-bottom: 1px solid #f1dce4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h2 {
            font-size: 20px;
        }

        .user {
            background: #fff0f5;
            color: #762b46;
            padding: 10px 14px;
            border-radius: 20px;
            font-size: 13px;
        }

        .content {
            max-width: 1200px;
            padding: 35px;
            margin: auto;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #762b46;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .heading p {
            color: #92717e;
            font-size: 14px;
            line-height: 1.6;
        }

        .panel {
            background: white;
            border: 1px solid #f1dce4;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 24px;
        }

        .panel h3 {
            color: #762b46;
            font-size: 17px;
            margin-bottom: 20px;
        }

        .search-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field label {
            display: block;
            color: #684554;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e8cdd8;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #432b36;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: #a94f70;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 22px;
            flex-wrap: wrap;
        }

        .button {
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .primary {
            background: #762b46;
            color: white;
        }

        .secondary {
            background: #f8e5ec;
            color: #762b46;
        }

        .result-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .result-heading h3 {
            margin-bottom: 0;
        }

        .result-count {
            color: #92717e;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        th {
            background: #fff3f7;
            color: #762b46;
            font-size: 12px;
            text-align: left;
            padding: 15px 13px;
        }

        td {
            padding: 16px 13px;
            border-bottom: 1px solid #f4e5eb;
            font-size: 13px;
            color: #684554;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .subject {
            color: #762b46;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 15px;
            background: #e0f5e8;
            color: #237445;
            font-size: 11px;
            font-weight: bold;
        }

        .view-link {
            color: #a34367;
            font-weight: bold;
            text-decoration: none;
            white-space: nowrap;
        }

        .empty {
            display: none;
            text-align: center;
            padding: 35px 15px;
            color: #92717e;
        }

        .empty h3 {
            margin-bottom: 8px;
        }

        .note {
            color: #92717e;
            font-size: 12px;
            margin-top: 17px;
            line-height: 1.6;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 190px;
            }

            .content {
                padding: 22px;
            }
        }

        @media (max-width: 560px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .content {
                padding: 18px 12px;
            }

            .search-grid {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 18px 14px;
            }

            .topbar {
                padding: 18px;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">EduScheduler</div>
        <div class="subtitle">Assessment Scheduling System</div>

        <div class="nav-title">Main Menu</div>
        <a href="/lecturer/dashboard" class="nav-link">⌂ Dashboard</a>
        <a href="/lecturer/create-assessment" class="nav-link">＋ Create Assessment</a>
        <a href="/lecturer/schedule" class="nav-link">▦ Schedule Calendar</a>
        <a href="/lecturer/search-schedule" class="nav-link active">⌕ Search Schedule</a>
        <a href="/notifications" class="nav-link">♧ Notifications</a>

        <div class="nav-title">Account</div>
        <a href="/profile" class="nav-link">♙ My Profile</a>
        <form action="{{ route('logout') }}" method="POST"
            onsubmit="return confirm('Are you sure you want to log out?')">
            @csrf

            <button type="submit" class="sidebar-logout">
                ↪ Log Out
            </button>
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <h2>Search Assessment</h2>
            <div class="user">♙ Lecturer / Student</div>
        </header>

        <section class="content">
            <div class="heading">
                <h1>Search Assessment Schedule</h1>
                <p>
                    Find scheduled assessments by subject, lecturer, class,
                    date or venue.
                </p>
            </div>

            <div class="panel">
                <h3>Search Filters</h3>

                <form id="searchForm">
                    <div class="search-grid">
                        <div class="field">
                            <label for="subject">Subject Name</label>
                            <input type="text" id="subject"
                                   placeholder="e.g. Database Management">
                        </div>

                        <div class="field">
                            <label for="lecturer">Lecturer Name</label>
                            <input type="text" id="lecturer"
                                   placeholder="e.g. Dr. Nur Aisyah">
                        </div>

                        <div class="field">
                            <label for="className">Class / Semester</label>
                            <input type="text" id="className"
                                   placeholder="e.g. DIP2A">
                        </div>

                        <div class="field">
                            <label for="venue">Venue</label>
                            <select id="venue">
                                <option value="">All Venues</option>
                                <option value="Computer Lab A">Computer Lab A</option>
                                <option value="Computer Lab B">Computer Lab B</option>
                                <option value="Lecture Room 1">Lecture Room 1</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="date">Assessment Date</label>
                            <input type="date" id="date">
                        </div>

                        <div class="field">
                            <label for="statusFilter">Status</label>
                            <select id="statusFilter">
                                <option value="">All Statuses</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>

                    <div class="actions">
                        <button type="submit" class="button primary">
                            Search Assessment
                        </button>

                        <button type="button" class="button secondary"
                                onclick="resetSearch()">
                            Clear Filters
                        </button>
                    </div>
                </form>

                <p class="note">
                    Note: Results on this page are sample data for the UI prototype.
                </p>
            </div>

            <div class="panel">
                <div class="result-heading">
                    <h3>Search Results</h3>
                    <span class="result-count" id="resultCount">4 assessments found</span>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Lecturer</th>
                                <th>Class</th>
                                <th>Date & Time</th>
                                <th>Venue</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="results">
                            <tr data-subject="database management"
                                data-lecturer="dr. nur aisyah"
                                data-class="dip2a semester 4"
                                data-venue="computer lab a"
                                data-date="2026-10-22"
                                data-status="scheduled">
                                <td class="subject">Database Management</td>
                                <td>Dr. Nur Aisyah</td>
                                <td>DIP2A / Sem 4</td>
                                <td>22 Oct 2026<br>10:00 AM – 11:00 AM</td>
                                <td>Computer Lab A</td>
                                <td><span class="status">Scheduled</span></td>
                                <td><a class="view-link" href="/lecturer/assessment-details">View</a></td>
                            </tr>

                            <tr data-subject="computer network technology"
                                data-lecturer="mr. faiz"
                                data-class="dip2a semester 4"
                                data-venue="computer lab b"
                                data-date="2026-10-23"
                                data-status="scheduled">
                                <td class="subject">Computer Network Technology</td>
                                <td>Mr. Faiz</td>
                                <td>DIP2A / Sem 4</td>
                                <td>23 Oct 2026<br>2:00 PM – 3:00 PM</td>
                                <td>Computer Lab B</td>
                                <td><span class="status">Scheduled</span></td>
                                <td><a class="view-link" href="/lecturer/assessment-details">View</a></td>
                            </tr>

                            <tr data-subject="algorithm analysis and design"
                                data-lecturer="ms. farah"
                                data-class="dip2b semester 4"
                                data-venue="lecture room 1"
                                data-date="2026-10-26"
                                data-status="pending">
                                <td class="subject">Algorithm Analysis and Design</td>
                                <td>Ms. Farah</td>
                                <td>DIP2B / Sem 4</td>
                                <td>26 Oct 2026<br>9:00 AM – 10:00 AM</td>
                                <td>Lecture Room 1</td>
                                <td><span class="status" style="background:#fff0d5;color:#98621a">Pending</span></td>
                                <td><a class="view-link" href="/lecturer/assessment-details">View</a></td>
                            </tr>

                            <tr data-subject="mobile app development"
                                data-lecturer="mr. daniel"
                                data-class="dip2c semester 4"
                                data-venue="computer lab a"
                                data-date="2026-10-28"
                                data-status="scheduled">
                                <td class="subject">Mobile App Development</td>
                                <td>Mr. Daniel</td>
                                <td>DIP2C / Sem 4</td>
                                <td>28 Oct 2026<br>11:00 AM – 12:00 PM</td>
                                <td>Computer Lab A</td>
                                <td><span class="status">Scheduled</span></td>
                                <td><a class="view-link" href="/lecturer/assessment-details">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="empty" id="emptyState">
                    <h3>No assessments found</h3>
                    <p>Try changing your search filters.</p>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    const form = document.getElementById('searchForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        searchAssessments();
    });

    function searchAssessments() {
        const subject = document.getElementById('subject').value.trim().toLowerCase();
        const lecturer = document.getElementById('lecturer').value.trim().toLowerCase();
        const className = document.getElementById('className').value.trim().toLowerCase();
        const venue = document.getElementById('venue').value.toLowerCase();
        const date = document.getElementById('date').value;
        const status = document.getElementById('statusFilter').value.toLowerCase();

        const rows = document.querySelectorAll('#results tr');
        let count = 0;

        rows.forEach(function(row) {
            const matches =
                row.dataset.subject.includes(subject) &&
                row.dataset.lecturer.includes(lecturer) &&
                row.dataset.class.includes(className) &&
                (!venue || row.dataset.venue === venue) &&
                (!date || row.dataset.date === date) &&
                (!status || row.dataset.status === status);

            row.style.display = matches ? '' : 'none';

            if (matches) {
                count++;
            }
        });

        document.getElementById('resultCount').textContent =
            count + (count === 1 ? ' assessment found' : ' assessments found');

        document.getElementById('emptyState').style.display =
            count === 0 ? 'block' : 'none';
    }

    function resetSearch() {
        form.reset();
        searchAssessments();
    }
</script>
</body>
</html>
