
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Details | EduScheduler</title>

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
            background: #762b46;
            color: white;
            padding: 28px 18px;
            flex-shrink: 0;
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
            gap: 12px;
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
            max-width: 1150px;
            padding: 35px;
            margin: auto;
        }

        .back-link {
            display: inline-block;
            color: #762b46;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #762b46;
            font-size: 28px;
            margin-bottom: 9px;
        }

        .heading p {
            color: #92717e;
            font-size: 14px;
        }

        .status {
            background: #e0f5e8;
            color: #237445;
            padding: 9px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .card {
            background: white;
            border: 1px solid #f1dce4;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 22px;
        }

        .card h3 {
            color: #762b46;
            font-size: 17px;
            margin-bottom: 22px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px;
        }

        .detail-label {
            color: #92717e;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .detail-value {
            color: #432b36;
            font-size: 15px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .description {
            background: #fff5f8;
            border-radius: 10px;
            padding: 18px;
            line-height: 1.7;
            color: #806573;
            font-size: 14px;
        }

        .rule-list {
            list-style: none;
        }

        .rule-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f5e6ec;
            font-size: 14px;
            color: #806573;
        }

        .rule-list li:last-child {
            border-bottom: none;
        }

        .rule-list li span {
            color: #762b46;
            margin-right: 10px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-decoration: none;
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

        .notice {
            display: none;
            padding: 14px;
            background: #e0f5e8;
            color: #237445;
            border-radius: 8px;
            font-size: 13px;
            margin-top: 18px;
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

            .details-grid {
                grid-template-columns: 1fr;
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
        <a href="/notifications" class="nav-link">♧ Notifications</a>

        <div class="nav-title">Account</div>
        <a href="/profile" class="nav-link">♙ My Profile</a>
        <a href="/login" class="nav-link">↪ Logout</a>
    </aside>

    <main class="main">
        <header class="topbar">
            <h2>Assessment Details</h2>
            <div class="user">♙ Lecturer</div>
        </header>

        <section class="content">

            <a href="/lecturer/schedule" class="back-link">
                ← Back to Schedule
            </a>

            <div class="heading">
                <div>
                    <h1>Assessment Details</h1>
                    <p>View the complete information for this assessment.</p>
                </div>

                <span class="status">● Scheduled</span>
            </div>

            <div class="card">
                <h3>Assessment Information</h3>

                <div class="details-grid">
                    <div>
                        <div class="detail-label">Assessment Title</div>
                        <div class="detail-value">Database Management Test 1</div>
                    </div>

                    <div>
                        <div class="detail-label">Subject Code</div>
                        <div class="detail-value">CSC2043</div>
                    </div>

                    <div>
                        <div class="detail-label">Subject Name</div>
                        <div class="detail-value">Database Management</div>
                    </div>

                    <div>
                        <div class="detail-label">Assessment Type</div>
                        <div class="detail-value">Class Test</div>
                    </div>

                    <div>
                        <div class="detail-label">Lecturer Name</div>
                        <div class="detail-value">Dr. Nur Aisyah</div>
                    </div>

                    <div>
                        <div class="detail-label">Class / Semester</div>
                        <div class="detail-value">DIP2A / Semester 4</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3>Schedule Information</h3>

                <div class="details-grid">
                    <div>
                        <div class="detail-label">Date</div>
                        <div class="detail-value">Thursday, 22 October 2026</div>
                    </div>

                    <div>
                        <div class="detail-label">Day</div>
                        <div class="detail-value">Thursday</div>
                    </div>

                    <div>
                        <div class="detail-label">Start Time</div>
                        <div class="detail-value">10:00 AM</div>
                    </div>

                    <div>
                        <div class="detail-label">End Time</div>
                        <div class="detail-value">11:00 AM</div>
                    </div>

                    <div>
                        <div class="detail-label">Duration</div>
                        <div class="detail-value">1 Hour</div>
                    </div>

                    <div>
                        <div class="detail-label">Venue</div>
                        <div class="detail-value">Computer Lab A</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3>Additional Information</h3>

                <div class="description">
                    This assessment covers database concepts, SQL queries and
                    database design. Students should arrive 10 minutes before
                    the assessment begins and bring their student identification card.
                </div>
            </div>

            <div class="card">
                <h3>Scheduling Rules</h3>

                <ul class="rule-list">
                    <li><span>✓</span> Venue and time slot are marked as available.</li>
                    <li><span>✓</span> No overlapping assessment is recorded for this class in this sample.</li>
                    <li><span>✓</span> Assessment duration is one hour.</li>
                    <li><span>✓</span> Sample schedule is displayed for demonstration only.</li>
                </ul>

                <div class="actions">
                    <a href="/lecturer/schedule" class="button secondary">
                        Back to Schedule
                    </a>

                    <button class="button primary" onclick="showReminder()">
                        Set Reminder
                    </button>
                </div>

                <div class="notice" id="reminderNotice">
                    Reminder selected! This is a UI demonstration; no actual notification has been scheduled.
                </div>
            </div>

        </section>
    </main>
</div>

<script>
    function showReminder() {
        document.getElementById('reminderNotice').style.display = 'block';
    }
</script>
</body>
</html>
