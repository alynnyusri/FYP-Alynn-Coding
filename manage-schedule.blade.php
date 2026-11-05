
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Assessment Schedule - EduScheduler</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fff5f7;
            color: #35252b;
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
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 26px;
        }

        .muted {
            color: #86757c;
            font-size: 13px;
            margin-top: 6px;
        }

        .primary-btn,
        .secondary-btn,
        .edit-btn,
        .delete-btn {
            border: none;
            border-radius: 7px;
            padding: 10px 13px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
        }

        .primary-btn {
            background: #b52f60;
            color: white;
        }

        .secondary-btn {
            background: #fbe4ec;
            color: #762b46;
        }

        .edit-btn {
            background: #fbe4ec;
            color: #762b46;
        }

        .delete-btn {
            background: #fff0f0;
            color: #c0394b;
        }

        button:hover,
        .primary-btn:hover,
        .secondary-btn:hover {
            opacity: 0.85;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .stat-card {
            padding: 18px;
            background: white;
            border: 1px solid #f1dce3;
            border-radius: 12px;
        }

        .stat-card p {
            color: #86757c;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .stat-card h2 {
            color: #762b46;
            font-size: 27px;
        }

        .panel {
            background: white;
            padding: 22px;
            border: 1px solid #f1dce3;
            border-radius: 14px;
        }

        .filters {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        input,
        select {
            padding: 11px;
            border: 1px solid #e2cbd4;
            border-radius: 7px;
            background: white;
            color: #35252b;
            outline-color: #a64e71;
        }

        .filters input {
            flex: 1;
            min-width: 180px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 13px 10px;
            text-align: left;
            border-bottom: 1px solid #f0e2e7;
            font-size: 13px;
        }

        th {
            background: #fff0f4;
            color: #762b46;
        }

        tbody tr:hover {
            background: #fffafb;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 11px;
            white-space: nowrap;
        }

        .status.scheduled {
            background: #d9f5e5;
            color: #237347;
        }

        .status.pending {
            background: #fff0bc;
            color: #876300;
        }

        .status.completed {
            background: #e9e4f9;
            color: #5b4794;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #86757c;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 10;
            background: rgba(40, 20, 29, 0.55);
            padding: 20px;
            overflow-y: auto;
        }

        .modal.show {
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .modal-content {
            background: white;
            width: 100%;
            max-width: 650px;
            margin: auto;
            padding: 25px;
            border-radius: 14px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }

        .modal-header h2 {
            color: #762b46;
            font-size: 21px;
        }

        .close-btn {
            border: none;
            background: transparent;
            font-size: 25px;
            cursor: pointer;
            color: #762b46;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 13px;
            font-weight: bold;
            color: #5d3948;
        }

        .form-group input,
        .form-group select {
            width: 100%;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .notice {
            display: none;
            padding: 12px 15px;
            background: #e2f6e9;
            color: #237347;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            margin-bottom: 18px;
            background: #fbe4ec;
            color: #762b46;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.2s;
        }

        .back-button:hover {
            background: #f8d5e3;
        }

        .back-icon {
            font-size: 18px;
            line-height: 1;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                padding: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
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
        class="{{ request()->is('lecturer/my-classes*') || request()->is('lecturer/manage-schedule*') ? 'active' : '' }}">
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
        <header class="topbar">

            <div>
                <a href="/lecturer/my-classes" class="back-button">
                    <span class="back-icon">←</span>
                    Back
                </a>

                <h1>Manage Assessment Schedule</h1>

                <p class="muted">
                    View, edit and manage your class assessments.
                </p>
            </div>

            <a class="primary-btn" href="/lecturer/create-assessment">
                + Create Assessment
            </a>

        </header>

        <div id="notice" class="notice" role="status"></div>

        <section class="stats">
            <div class="stat-card">
                <p>Total Assessments</p>
                <h2 id="totalCount">0</h2>
            </div>

            <div class="stat-card">
                <p>Upcoming Assessments</p>
                <h2 id="upcomingCount">0</h2>
            </div>

            <div class="stat-card">
                <p>Past Assessments</p>
                <h2 id="pastCount">0</h2>
            </div>
        </section>

        <section class="panel">
            <h2>Assessment List</h2>
            <p class="muted">
                Edit the assessment details or delete an assessment.
            </p>

            <div class="filters">
                <input
                    type="search"
                    id="searchInput"
                    placeholder="Search subject, class or venue..."
                    aria-label="Search assessments"
                >

                <select id="statusFilter" aria-label="Filter by status">
                    <option value="all">All Assessments</option>
                    <option value="upcoming">Upcoming</option>
                    <option value="past">Past</option>
                </select>

                <select id="classFilter" aria-label="Filter by class">
                    <option value="all">All Classes</option>
                    @foreach ($assessments->pluck('class')->unique()->sort() as $class)
                        <option value="{{ $class }}">{{ $class }}</option>
                    @endforeach
                </select>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Subject / Assessment</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Class</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="assessmentTable"></tbody>
                </table>
            </div>

            <p id="emptyMessage" class="empty" hidden>
                No assessments found. Try another search or filter.
            </p>
        </section>
    </main>

    <div class="modal" id="editModal" role="dialog"
         aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Edit Assessment</h2>
                <button type="button" class="close-btn"
                        id="closeModalBtn" aria-label="Close">&times;</button>
            </div>

            <form id="editForm">
                <input type="hidden" id="editId">

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="editSubject">Subject</label>
                        <input id="editSubject" required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="editType">Assessment Type</label>
                        <select id="editType" required>
                            <option>Written Test 1</option>
                            <option>Written Test 2</option>
                            <option>Quiz</option>
                            <option>Presentation</option>
                            <option>Practical Test</option>
                            <option>Replacement Class</option>
                            <option>Assignment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editClass">Class / Semester</label>
                        <select id="editClass" required>
                            <option>DCS5A</option>
                            <option>DCS5B</option>
                            <option>DCS5C</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editDate">Date</label>
                        <input type="date" id="editDate" required>
                    </div>

                    <div class="form-group">
                        <label for="editTime">Start Time</label>
                        <input type="time" id="editTime" required>
                    </div>

                    <div class="form-group">
                        <label for="editDuration">Duration (minutes)</label>
                        <input type="number" id="editDuration"
                               min="15" max="360" step="15" required>
                    </div>

                    <div class="form-group">
                        <label for="editVenue">Venue</label>
                        <select id="editVenue" required>
                            <option>Lab A</option>
                            <option>Lab B</option>
                            <option>LT 2</option>
                            <option>LT 3</option>
                            <option>Room 17</option>
                            <option>Online</option>
                        </select>
                    </div>
                </div>

                <p id="formError" role="alert"
                   style="color:#c0394b;font-size:13px;margin-top:14px;"></p>

                <div class="modal-actions">
                    <button type="button" class="secondary-btn"
                            id="cancelBtn">Cancel</button>
                    <button type="submit" class="primary-btn">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>

    const dbAssessments = @json($assessments);
    
    let assessments = dbAssessments.map(item => ({
        id: item.id,
        subject: item.subject,
        type: item.assessment_type,
        date: item.date,
        time: item.start_time
            ? item.start_time.substring(0, 5)
            : "",
        duration: Number(item.duration),
        venue: item.venue,
        className: item.class,
        status: item.status
    }));


        const table = document.getElementById("assessmentTable");
        const searchInput = document.getElementById("searchInput");
        const statusFilter = document.getElementById("statusFilter");
        const classFilter = document.getElementById("classFilter");
        const modal = document.getElementById("editModal");
        const form = document.getElementById("editForm");
        const notice = document.getElementById("notice");

        let noticeTimer;

        function escapeHTML(value) {
            return String(value).replace(/[&<>"']/g, function (char) {
                return {
                    "&": "&amp;",
                    "<": "&lt;",
                    ">": "&gt;",
                    '"': "&quot;",
                    "'": "&#039;"
                }[char];
            });
        }

        function getStatus(item) {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const assessmentDate = new Date(item.date + "T00:00:00");

            if (assessmentDate < today) return "Past";
            if (assessmentDate.getTime() === today.getTime()) return "Today";
            return "Upcoming";
        }

        function formatDate(date) {
            if (!date) return "-";

            const parts = date.split("-");
            return `${parts[2]}/${parts[1]}/${parts[0]}`;
        }

        function formatTime(time) {
            if (!time) return "-";

            const [hours, minutes] = time.split(":").map(Number);
            const suffix = hours >= 12 ? "PM" : "AM";
            const hour12 = hours % 12 || 12;

            return `${hour12}:${String(minutes).padStart(2, "0")} ${suffix}`;
        }

        function renderTable() {
            const query = searchInput.value.trim().toLowerCase();
            const status = statusFilter.value;
            const selectedClass = classFilter.value;

            const filtered = assessments.filter(function (item) {
                const text = [
                    item.subject, item.type, item.venue, item.className
                ].join(" ").toLowerCase();

                const matchesSearch = text.includes(query);
                const itemStatus = getStatus(item);

                const matchesStatus =
                    status === "all" ||
                    (status === "upcoming" &&
                        (itemStatus === "Upcoming" || itemStatus === "Today")) ||
                    (status === "past" && itemStatus === "Past");

                const matchesClass =
                    selectedClass === "all" ||
                    item.className === selectedClass;

                return matchesSearch && matchesStatus && matchesClass;
            });

            table.innerHTML = filtered.map(function (item) {
                const status = getStatus(item);
                const statusClass =
                    status === "Past" ? "completed" :
                    status === "Today" ? "pending" : "scheduled";

                return `
                    <tr>
                        <td>${escapeHTML(item.subject)}</td>
                        <td>${escapeHTML(item.type)}</td>
                        <td>${formatDate(item.date)}</td>
                        <td>${formatTime(item.time)}</td>
                        <td>${escapeHTML(item.venue)}</td>
                        <td>${escapeHTML(item.className)}</td>
                        <td>
                            <span class="status ${statusClass}">
                                ${status}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="edit-btn"
                                    data-action="edit"
                                    data-id="${item.id}">Edit</button>
                                <button class="delete-btn"
                                    data-action="delete"
                                    data-id="${item.id}">Delete</button>
                            </div>
                        </td>
                    </tr>
                `;
            }).join("");

            document.getElementById("emptyMessage").hidden =
                filtered.length !== 0;

            document.getElementById("totalCount").textContent =
                assessments.length;

            document.getElementById("upcomingCount").textContent =
                assessments.filter(item =>
                    getStatus(item) === "Upcoming" ||
                    getStatus(item) === "Today"
                ).length;

            document.getElementById("pastCount").textContent =
                assessments.filter(item => getStatus(item) === "Past").length;
        }

        function showNotice(message) {
            clearTimeout(noticeTimer);
            notice.textContent = message;
            notice.style.display = "block";

            noticeTimer = setTimeout(function () {
                notice.style.display = "none";
            }, 3500);
        }

        function openEdit(id) {
            const item = assessments.find(item => item.id === id);
            if (!item) return;

            document.getElementById("editId").value = item.id;
            document.getElementById("editSubject").value = item.subject;
            document.getElementById("editType").value = item.type;
            document.getElementById("editClass").value = item.className;
            document.getElementById("editDate").value = item.date;
            document.getElementById("editTime").value = item.time;
            document.getElementById("editDuration").value = item.duration;
            document.getElementById("editVenue").value = item.venue;
            document.getElementById("formError").textContent = "";

            modal.classList.add("show");
        }

        function closeEdit() {
            modal.classList.remove("show");
            form.reset();
            document.getElementById("formError").textContent = "";
        }

        // troubleshoot

        table.addEventListener("click", async function (event) {
            const button = event.target.closest("button[data-action]");
            if (!button) return;

            const id = Number(button.dataset.id);

            if (button.dataset.action === "edit") {
                openEdit(id);
                return;
            }

            if (button.dataset.action === "delete") {
                const item = assessments.find(item => item.id === id);
                if (!item) return;

                const confirmed = confirm(
                    `Delete "${item.subject}" for ${item.className} on ${formatDate(item.date)}?`
                );

                if (!confirmed) return;

                button.disabled = true;

                try {
                    const response = await fetch(`/lecturer/manage-schedule/${id}`, {
                        method: "DELETE",
                        headers: {
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        },
                        credentials: "same-origin"
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(data.message || "Unable to delete assessment.");
                    }

                    // Remove from the page only after database deletion succeeds.
                    assessments = assessments.filter(item => item.id !== id);

                    renderTable();
                    showNotice(data.message || "Assessment deleted successfully.");

                } catch (error) {
                    showNotice(error.message);
                    button.disabled = false;
                }
            }
        });

        form.addEventListener("submit", async function (event) {
            event.preventDefault();

            const id = Number(document.getElementById("editId").value);
            const subject = document.getElementById("editSubject").value.trim();
            const date = document.getElementById("editDate").value;
            const time = document.getElementById("editTime").value;
            const duration = Number(document.getElementById("editDuration").value);
            const venue = document.getElementById("editVenue").value;
            const className = document.getElementById("editClass").value;
            const type = document.getElementById("editType").value;

            const error = document.getElementById("formError");

            if (!subject || !date || !time || !duration) {
                error.textContent = "Please complete all required fields.";
                return;
            }

            // Check for overlapping bookings in the current page data.
            const startMinutes = timeToMinutes(time);
            const endMinutes = startMinutes + duration;

            const conflict = assessments.find(function (other) {
                if (other.id === id || other.date !== date) return false;

                const otherStart = timeToMinutes(other.time);
                const otherEnd = otherStart + other.duration;

                const overlaps =
                    startMinutes < otherEnd && endMinutes > otherStart;

                const sameVenue = other.venue === venue;
                const sameClass = other.className === className;

                return overlaps && (sameVenue || sameClass);
            });

            if (conflict) {
                error.textContent =
                    `Conflict: ${conflict.subject} already uses the same venue or class during this time.`;
                return;
            }

            const item = assessments.find(item => item.id === id);
            if (!item) return;

            const saveButton = form.querySelector('button[type="submit"]');
            saveButton.disabled = true;
            error.textContent = "";

            try {
                const response = await fetch(`/lecturer/manage-schedule/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },
                    credentials: "same-origin",
                    body: JSON.stringify({
                        subject: subject,
                        assessment_type: type,
                        class: className,
                        date: date,
                        start_time: time,
                        duration: duration,
                        venue: venue
                    })
                });

                const data = await response.json();

                if (!response.ok) {
                    if (data.errors) {
                        error.textContent = Object.values(data.errors)
                            .flat()
                            .join(" ");
                    } else {
                        error.textContent =
                            data.message || "Unable to update assessment.";
                    }

                    return;
                }

                // Update the page only after Laravel confirms success.
                item.subject = subject;
                item.type = type;
                item.className = className;
                item.date = date;
                item.time = time;
                item.duration = duration;
                item.venue = venue;

                closeEdit();
                renderTable();

                showNotice(data.message || "Assessment updated successfully.");

            } catch (err) {
                error.textContent = "An error occurred. Please try again.";
                console.error(err);

            } finally {
                saveButton.disabled = false;
            }
        });



        function timeToMinutes(time) {
            const parts = time.split(":").map(Number);
            return parts[0] * 60 + parts[1];
        }

        document.getElementById("closeModalBtn")
            .addEventListener("click", closeEdit);

        document.getElementById("cancelBtn")
            .addEventListener("click", closeEdit);

        modal.addEventListener("click", function (event) {
            if (event.target === modal) closeEdit();
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") closeEdit();
        });

        searchInput.addEventListener("input", renderTable);
        statusFilter.addEventListener("change", renderTable);
        classFilter.addEventListener("change", renderTable);

        renderTable();
    </script>
</body>
</html>
