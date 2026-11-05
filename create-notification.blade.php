
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Notification | Assessment Scheduling</title>

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
            padding: 18px 24px;
            border-radius: 14px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .topbar h3 {
            margin: 0 0 5px;
            font-size: 20px;
        }

        .topbar p {
            margin: 0;
            color: #876777;
            font-size: 13px;
        }

        .admin-user {
            font-size: 14px;
            font-weight: bold;
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
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
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

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(280px, 1fr);
            gap: 22px;
            align-items: start;
        }

        .section {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 13px;
            padding: 23px;
            margin-bottom: 22px;
            min-width: 0;
        }

        .section h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .section-description {
            margin: 0 0 23px;
            color: #876777;
            font-size: 13px;
            line-height: 1.6;
        }

        .field {
            margin-bottom: 19px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .field small {
            display: block;
            margin-top: 6px;
            color: #876777;
            font-size: 12px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            background: white;
            color: #321322;
            font-family: Arial, sans-serif;
            font-size: 13px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #b52f60;
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.6;
        }

        .required {
            color: #b52f60;
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .action-buttons form {
            margin: 0;
        }

        .action-buttons .btn {
            margin: 0;
            white-space: nowrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            background: #b52f60;
            color: white;
            border: none;
            border-radius: 8px;
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

        .preview-card {
            border: 1px solid #f0cfdb;
            border-radius: 11px;
            overflow: hidden;
            background: #fffafd;
        }

        .preview-header {
            padding: 15px 17px;
            background: #ffe4ed;
            color: #92264b;
            font-size: 13px;
            font-weight: bold;
        }

        .preview-body {
            padding: 18px;
        }

        .preview-category {
            display: inline-block;
            padding: 6px 9px;
            background: #f8e5ed;
            color: #92264b;
            border-radius: 20px;
            font-size: 11px;
            margin-bottom: 12px;
        }

        .preview-body h4 {
            margin: 0 0 12px;
            font-size: 17px;
            overflow-wrap: anywhere;
        }

        .preview-body p {
            margin: 0;
            color: #765163;
            font-size: 13px;
            line-height: 1.7;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .preview-meta {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #f0dce5;
            font-size: 12px;
            color: #876777;
            line-height: 1.8;
        }

        .notice {
            margin-top: 17px;
            padding: 13px;
            border-radius: 8px;
            background: #fff5e6;
            border: 1px solid #f3dfb7;
            color: #805c20;
            font-size: 12px;
            line-height: 1.6;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th {
            text-align: left;
            padding: 13px 12px;
            background: #fff5f8;
            color: #765163;
            font-size: 12px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #f6e7ed;
            font-size: 13px;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .sent {
            background: #e4f6e9;
            color: #287544;
        }

        .draft {
            background: #fff0d7;
            color: #99610a;
        }

        .empty-message {
            text-align: center;
            color: #876777;
            font-size: 13px;
            padding: 20px;
        }

        @media (max-width: 1100px) {
            .content-grid {
                grid-template-columns: 1fr;
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

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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
            <div>
                <strong>
                    EduScheduler
                </strong>
            </div>
            <div class="admin-user">👤 Administrator</div>
        </div>

        <div class="page-heading">
            <h2>Notification Management</h2>
            <p>Create announcements and assessment reminders for lecturers and students.</p>
        </div>

        {{-- Success message --}}
        @if (session('success'))
            <div class="notice">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="notice">
                <strong>Please check the following:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="stats">
            <div class="stat-card">
                <p>Total Notifications</p>
                <h2 id="totalCount">{{ $totalNotifications }}</h2>
            </div>

            <div class="stat-card">
                <p>Sent Notifications</p>
                <h2 id="sentCount">{{ $sentNotifications }}</h2>
            </div>

            <div class="stat-card">
                <p>Draft Notifications</p>
                <h2 id="draftCount">{{ $draftNotifications }}</h2>
            </div>
        </div>

        <div class="content-grid">

            <section class="section">
                <h3>Create New Notification</h3>
                <p class="section-description">
                    Fill in the details below to prepare a notification.
                    Fields marked with <span class="required">*</span> are required.
                </p>

                <form id="notificationForm"
                        action="{{ route('admin.create-notification.store') }}"
                        method="POST">
                    @csrf

                    <div class="field">
                        <label for="title">
                            Notification Title <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            maxlength="100"
                            placeholder="e.g. Assessment Schedule Reminder"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="recipient">
                            Recipient <span class="required">*</span>
                        </label>
                        <select id="recipient" name="recipient" required>
                            <option value="All Users">All Users</option>
                            <option value="Lecturers">Lecturers</option>
                            <option value="Students">Students</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="category">
                            Notification Category <span class="required">*</span>
                        </label>
                        <select id="category" name="category" required>
                            <option value="General Announcement">General Announcement</option>
                            <option value="Assessment Reminder">Assessment Reminder</option>
                            <option value="Schedule Update">Schedule Update</option>
                            <option value="Scheduling Conflict">Scheduling Conflict</option>
                            <option value="Important Notice">Important Notice</option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="date">
                            Notification Date <span class="required">*</span>
                        </label>
                        <input type="date" id="date" name="notification_date" required>
                    </div>

                    <div class="field">
                        <label for="message">
                            Message <span class="required">*</span>
                        </label>
                        <textarea
                            id="message"
                            name= "message"
                            maxlength="1000"
                            placeholder="Write your notification message here..."
                            required
                        ></textarea>
                        <small><span id="charCount">0</span>/1000 characters</small>
                    </div>

                    <div class="button-row">
                        <button type="submit" name="status" value="Sent" class="btn">
                            Send Notification
                        </button>

                        <button type="submit" name="status" value="Draft" class="btn btn-light">
                            Save as Draft
                        </button>

                        <button type="reset" class="btn btn-light">
                            Clear Form
                        </button>
                    </div>

                </form>
            </section>

            <div>
                <section class="section">
                    <h3>Notification Preview</h3>
                    <p class="section-description">
                        Preview updates automatically as you fill in the form.
                    </p>

                    <div class="preview-card">
                        <div class="preview-header">
                            🔔 Assessment Scheduling System
                        </div>

                        <div class="preview-body">
                            <span class="preview-category" id="previewCategory">
                                General Announcement
                            </span>

                            <h4 id="previewTitle">Notification title will appear here</h4>

                            <p id="previewMessage">Your notification message will appear here.</p>

                            <div class="preview-meta">
                                <div>👥 Recipient: <strong id="previewRecipient">All Users</strong></div>
                                <div>📅 Date: <strong id="previewDate">Not selected</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="notice">
                        <strong>Note:</strong>
                        Preview your notification before saving.
                    </div>
                </section>
            </div>

        </div>

        <section class="section">
            <h3>Recent Notifications</h3>
            <p class="section-description">
                View notifications prepared in this demo interface.
            </p>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Recipient</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="notificationTable">
                        @forelse ($notifications as $notification)
                            <tr>
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->recipient }}</td>
                                <td>{{ $notification->category }}</td>
                                <td>{{ $notification->notification_date }}</td>
                                <td>
                                    <span class="status {{ $notification->status === 'Sent' ? 'sent' : 'draft' }}">
                                        {{ $notification->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        @if ($notification->status === 'Draft')
                                            <a
                                                href="{{ route('admin.notifications.edit', $notification->id) }}"
                                                class="btn btn-light"
                                                style="text-decoration: none;"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('admin.notifications.send', $notification->id) }}"
                                                method="POST"
                                            >
                                                @csrf

                                                <button type="submit" class="btn">
                                                    Send
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('admin.notifications.destroy', $notification->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this draft notification?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn"
                                                    style="background: #a83232;"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            <span class="status sent">Sent</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-message">
                                    No notifications found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <script>
        const titleInput = document.getElementById('title');
        const recipientInput = document.getElementById('recipient');
        const categoryInput = document.getElementById('category');
        const dateInput = document.getElementById('date');
        const messageInput = document.getElementById('message');
        const form = document.getElementById('notificationForm');

        let totalCount = 3;
        let sentCount = 2;
        let draftCount = 1;

        function updatePreview() {
            document.getElementById('previewTitle').textContent =
                titleInput.value.trim() || 'Notification title will appear here';

            document.getElementById('previewRecipient').textContent =
                recipientInput.value;

            document.getElementById('previewCategory').textContent =
                categoryInput.value;

            document.getElementById('previewMessage').textContent =
                messageInput.value.trim() ||
                'Your notification message will appear here.';

            document.getElementById('previewDate').textContent =
                dateInput.value || 'Not selected';

            document.getElementById('charCount').textContent =
                messageInput.value.length;
        }

        [titleInput, recipientInput, categoryInput, dateInput, messageInput]
            .forEach(function(element) {
                element.addEventListener('input', updatePreview);
                element.addEventListener('change', updatePreview);
            });

        form.addEventListener('reset', function() {
            setTimeout(updatePreview, 0);
        });

        updatePreview();
    </script>

</body>
</html>
