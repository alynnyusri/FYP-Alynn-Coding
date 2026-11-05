
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Assessment</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #351426;
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
            padding: 25px;
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

        .heading h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .muted { color: #806b77; }

        .panel {
            max-width: 1000px;
            margin-top: 25px;
            padding: 28px;
            background: white;
            border: 1px solid #f2dce5;
            border-radius: 14px;
            box-shadow: 0 5px 18px #6b24400b;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e5d7df;
            border-radius: 7px;
            background: white;
            font: inherit;
            font-size: 13px;
            color: #351426;
        }

        .field textarea {
            resize: vertical;
            min-height: 85px;
        }

        .full { grid-column: 1 / -1; }

        
        .create-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(280px, 0.8fr);
            gap: 22px;
            align-items: start;
            margin-top: 25px;
        }

        .create-layout .panel {
            max-width: none;
            margin-top: 0;
            min-width: 0;
        }

        .timetable-panel {
            padding: 24px;
            background: white;
            border: 1px solid #f2dce5;
            border-radius: 14px;
            box-shadow: 0 5px 18px #6b24400b;
        }

        .timetable-panel h2 {
            font-size: 20px;
            margin: 0 0 8px;
        }

        .timetable-select {
            width: 100%;
            padding: 12px;
            margin: 15px 0 20px;
            border: 1px solid #e5d7df;
            border-radius: 7px;
            background: white;
            font-size: 13px;
            color: #351426;
        }

        .timetable-image {
            width: 100%;
            height: auto;
            display: block;
            border: 1px solid #f2dce5;
            border-radius: 10px;
            cursor: zoom-in;
        }

        .timetable-empty {
            background: #fff5f8;
            color: #806b77;
            padding: 20px;
            border-radius: 8px;
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 1100px) {
            .create-layout {
                grid-template-columns: 1fr;
            }
        }


        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 28px;
        }

        .button {
            border: 0;
            border-radius: 8px;
            padding: 13px 22px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
        }

        .primary {
            background: #b52f60;
            color: white;
        }

        .secondary {
            background: white;
            color: #8c284c;
            border: 1px solid #e5c5d2;
        }

        .required { color: #dc2858; }

        @media (max-width: 800px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .main { margin-left: 0; }
            .form-grid { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
        }

        
        .calendar-panel {
            margin-top: 25px;
            padding: 24px;
            background: white;
            border: 1px solid #f2dce5;
            border-radius: 14px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-header button {
            background: #fff0f5;
            color: #92264b;
            border: 1px solid #f2dce5;
            border-radius: 8px;
            padding: 9px 14px;
            cursor: pointer;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, minmax(0, 1fr));
            gap: 7px;
        }

        .calendar-day-name {
            text-align: center;
            font-size: 12px;
            font-weight: bold;
            color: #806b77;
            padding: 10px 0;
        }

        .calendar-date {
            min-height: 75px;
            padding: 8px;
            border: 1px solid #f2dce5;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            color: #351426;
            text-align: left;
        }

        .calendar-date:hover,
        .calendar-date.selected {
            background: #ffe4ed;
            border-color: #b52f60;
        }

        .calendar-date.today {
            box-shadow: inset 0 0 0 1px #b52f60;
        }

        .calendar-event-dot {
            display: block;
            margin-top: 6px;
            color: #b52f60;
            font-size: 11px;
            overflow-wrap: anywhere;
        }

        .calendar-details {
            margin-top: 22px;
            padding: 16px;
            border-radius: 10px;
            background: #fff5f8;
        }

        @media (max-width: 600px) {
            .calendar-grid {
                gap: 3px;
            }

            .calendar-date {
                min-height: 55px;
                padding: 4px;
                font-size: 12px;
            }

            .calendar-event-dot {
                font-size: 9px;
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

        <div class="heading">
            <h1>Create Assessment</h1>
            <div class="muted">
                Fill in the details to schedule a new assessment.
            </div>
        </div>

        <div class="create-layout">
            <section class="panel">
                <form action="{{ route('lecturer.assessments.store') }}" method="POST" id="assessmentForm">
                @csrf
                @if ($errors->has('availability'))
                    <div style="background: #ffe4e8; color: #a61b3b; padding: 14px; border-radius: 8px; margin-bottom: 18px;">
                        <strong>⚠️ Assessment Conflict!</strong>
                        <p style="margin: 6px 0 0;">
                            {{ $errors->first('availability') }}
                        </p>
                    </div>
                @endif

                @if (session('success'))
                    <div style="background: #e4f7e9; color: #216e39; padding: 14px; border-radius: 8px; margin-bottom: 18px;">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-grid">

                    <div class="field">
                        <label>Subject <span class="required">*</span></label>

                        <select name="subject" required>
                            <option value="">Select subject</option>

                            @foreach($subjects as $subject)
                                <option
                                    value="{{ $subject->subject_name }}"
                                    {{ old('subject') == $subject->subject_name ? 'selected' : '' }}
                                >
                                    {{ $subject->subject_code }} - {{ $subject->subject_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="field">
                        <label>Assessment Type <span class="required">*</span></label>
                        <select name="assessment_type" required>
                            <option value="">Select type</option>
                            <option>Quiz</option>
                            <option>Midterm Test</option>
                            <option>Final Test</option>
                            <option>Practical Test</option>
                            <option>Presentation</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Class / Semester <span class="required">*</span></label>
                        <select name="class" required>
                            <option value="">Select class</option>

                            @if(auth()->user()->department === 'Computer Science')
                                <option value="DCS5A" {{ old('class') == 'DCS5A' ? 'selected' : '' }}>DCS5A</option>
                                <option value="DCS5B" {{ old('class') == 'DCS5B' ? 'selected' : '' }}>DCS5B</option>
                                <option value="DCS5C" {{ old('class') == 'DCS5C' ? 'selected' : '' }}>DCS5C</option>
                            @elseif(auth()->user()->department === 'Account')
                                <option value="DIA5A" {{ old('class') == 'DIA5A' ? 'selected' : '' }}>DIA5A</option>
                                <option value="DIA5B" {{ old('class') == 'DIA5B' ? 'selected' : '' }}>DIA5B</option>
                                <option value="DIA5C" {{ old('class') == 'DIA5C' ? 'selected' : '' }}>DIA5C</option>
                            @endif
                        </select>
                    </div>

                    <div class="field">
                        <label>Date <span class="required">*</span></label>
                        <input type="date" name="date" required>
                    </div>

                    <div class="field">
                        <label>Start Time <span class="required">*</span></label>
                        <select name="start_time" required>
                            <option value="">Select time</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Duration <span class="required">*</span></label>
                        <select name="duration" required>
                            <option value="">Select duration</option>
                            <option value="30">30 minutes</option>
                            <option value="60">1 hour</option>
                            <option value="90">1 hour 30 minutes</option>
                            <option value="120">2 hours</option>
                            <option value="180">3 hours</option>
                        </select>
                    </div>

                    <div class="field full">
                        <label>Venue <span class="required">*</span></label>
                        <select name="venue" required>
                            <option value="">Select venue</option>

                            @foreach($venues as $venue)
                                <option value="{{ $venue->venue_name }}"
                                    {{ old('venue') == $venue->venue_name ? 'selected' : '' }}>
                                    {{ $venue->venue_name }} - {{ $venue->location }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field full">
                        <label>Description</label>
                        <textarea name="description"
                            placeholder="Enter assessment details (optional)"></textarea>
                    </div>

                </div>

                <div class="actions">
                    <button type="reset" class="button secondary">
                        Reset
                    </button>

                    <button type="button" class="button primary"
                        onclick="checkAvailability()">
                        Check Availability
                    </button>
                </div>
            </form>
        </section>

            <!-- CLASS TIMETABLE CARD -->
        <section class="timetable-panel">

            <h2>📅 Class Timetable</h2>

            <p class="muted" style="font-size:13px; line-height:1.5;">
                Select a class to view its permanent timetable.
                Use this timetable as a reference when choosing
                an assessment date and time.
            </p>

            <label for="timetableClass"
                style="font-size:13px; font-weight:bold;">
                Select Class
            </label>

            
            <select id="timetableClass" class="timetable-select">
                <option value="">Choose a class</option>

                @if(auth()->user()->department === 'Computer Science')
                    <option value="DCS5A">DCS5A</option>
                    <option value="DCS5B">DCS5B</option>
                    <option value="DCS5C">DCS5C</option>
                @elseif(auth()->user()->department === 'Account')
                    <option value="DIA5A">DIA5A</option>
                    <option value="DIA5B">DIA5B</option>
                    <option value="DIA5C">DIA5C</option>
                @endif
            </select>


            <div id="timetableContent">
                <div class="timetable-empty">
                    Please select a class to view its timetable.
                </div>
            </div>

        </section>

    </div>
        
        <section class="calendar-panel">
            <h2>Assessment Calendar</h2>
            <p class="muted">
                Select a date to view assessments scheduled for that day.
            </p>

            <div class="calendar-header">
                <button type="button" id="previousMonth">
                    &lt; Previous
                </button>

                <h3 id="calendarMonth"></h3>

                <button type="button" id="nextMonth">
                    Next &gt;
                </button>
            </div>

            <div class="calendar-grid" id="calendarGrid"></div>

            <div class="calendar-details">
                <h3 id="selectedDateTitle">Select a date</h3>
                <div id="assessmentList">
                    Click a date to view its assessments.
                </div>
            </div>
        </section>

    </main>

    <script>
        function checkAvailability() {
            const form = document.getElementById('assessmentForm');

            if (!form.reportValidity()) {
                return;
            }

            form.submit();
        }
    </script>
    
    <script>
        let calendarDate = new Date();
        let selectedDate = null;
        let assessments = [];

        function getSelectedClass() {
            return document.querySelector('[name="class"]').value;
        }

        function getFilteredAssessments() {
            const selectedClass = getSelectedClass();

            if (!selectedClass) {
                return assessments;
            }

            return assessments.filter(
                item => item.class === selectedClass
            );
        }

        const monthNames = [
            'January', 'February', 'March', 'April',
            'May', 'June', 'July', 'August',
            'September', 'October', 'November', 'December'
        ];

        async function loadAssessments() {
            const month =
                `${calendarDate.getFullYear()}-${String(calendarDate.getMonth() + 1).padStart(2, '0')}`;

            try {
                const response = await fetch(
                    `{{ route('lecturer.assessments.calendar') }}?month=${month}`
                );

                if (!response.ok) {
                    throw new Error('Unable to load assessments.');
                }

                assessments = await response.json();
                renderCalendar();

                if (selectedDate) {
                    showAssessments(selectedDate);
                }
            } catch (error) {
                document.getElementById('assessmentList').textContent =
                    'Unable to load assessments. Please check the route and try again.';
            }
        }

        function renderCalendar() {
            const grid = document.getElementById('calendarGrid');
            const title = document.getElementById('calendarMonth');

            if (!grid || !title) return;

            title.textContent =
                `${monthNames[calendarDate.getMonth()]} ${calendarDate.getFullYear()}`;

            grid.innerHTML = '';

            ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
                .forEach(day => {
                    const heading = document.createElement('div');
                    heading.className = 'calendar-day-name';
                    heading.textContent = day;
                    grid.appendChild(heading);
                });

            const year = calendarDate.getFullYear();
            const month = calendarDate.getMonth();
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                grid.appendChild(document.createElement('div'));
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dateString =
                    `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'calendar-date';
                button.textContent = day;

                if (selectedDate === dateString) {
                    button.classList.add('selected');
                }

                const dayAssessments = getFilteredAssessments().filter(
                    item => item.date === dateString
                );

                if (dayAssessments.length > 0) {
                    const dot = document.createElement('span');
                    dot.className = 'calendar-event-dot';
                    dot.textContent = `${dayAssessments.length} assessment(s)`;
                    button.appendChild(dot);
                }

                button.addEventListener('click', () => {
                    selectedDate = dateString;

                    const dateInput = document.querySelector('[name="date"]');
                    if (dateInput) {
                        dateInput.value = dateString;
                    }

                    renderCalendar();
                    showAssessments(dateString);
                });

                grid.appendChild(button);
            }
        }

        
        function showAssessments(dateString) {
            const title = document.getElementById('selectedDateTitle');
            const list = document.getElementById('assessmentList');

            title.textContent = `Assessments on ${dateString}`;
            list.innerHTML = '';

            const dayAssessments = getFilteredAssessments().filter(
                item => item.date === dateString
            );

            if (dayAssessments.length === 0) {
                list.textContent = 'No assessments booked for this date.';
                return;
            }

            dayAssessments.forEach(item => {
                const card = document.createElement('div');

                card.style.padding = '18px';
                card.style.marginTop = '14px';
                card.style.background = 'white';
                card.style.border = '1px solid #f2dce5';
                card.style.borderLeft = '5px solid #b52f60';
                card.style.borderRadius = '10px';
                card.style.boxShadow = '0 3px 10px #6b24400b';

                const time = String(item.start_time || '00:00').slice(0, 5);
                const [hours, minutes] = time.split(':').map(Number);

                const totalMinutes =
                    hours * 60 + minutes + Number(item.duration || 0);

                const endHours = Math.floor(totalMinutes / 60) % 24;
                const endMinutes = totalMinutes % 60;

                const endTime =
                    `${String(endHours).padStart(2, '0')}:${String(endMinutes).padStart(2, '0')}`;

                const heading = document.createElement('h3');
                heading.textContent = item.subject || 'Assessment';
                heading.style.margin = '0 0 14px';
                heading.style.color = '#92264b';

                card.appendChild(heading);

                const details = [
                    ['Assessment Type', item.assessment_type],
                    ['Class / Semester', item.class],
                    ['Date', item.date],
                    ['Time', `${time} - ${endTime}`],
                    ['Duration', `${item.duration} minutes`],
                    ['Venue', item.venue],
                    ['Lecturer', item.lecturer_name || 'Not available'],
                    ['Status', item.status]
                ];

                const grid = document.createElement('div');
                grid.style.display = 'grid';
                grid.style.gridTemplateColumns =
                    'repeat(auto-fit, minmax(180px, 1fr))';
                grid.style.gap = '12px';

                details.forEach(([label, value]) => {
                    const detail = document.createElement('div');

                    const detailLabel = document.createElement('div');
                    detailLabel.textContent = label;
                    detailLabel.style.fontSize = '12px';
                    detailLabel.style.color = '#806b77';
                    detailLabel.style.marginBottom = '5px';

                    const detailValue = document.createElement('div');
                    detailValue.textContent = value ?? '-';
                    detailValue.style.fontWeight = 'bold';
                    detailValue.style.overflowWrap = 'anywhere';

                    detail.appendChild(detailLabel);
                    detail.appendChild(detailValue);
                    grid.appendChild(detail);
                });

                card.appendChild(grid);
                list.appendChild(card);
            });
        }


        document.getElementById('previousMonth')?.addEventListener('click', () => {
            calendarDate.setMonth(calendarDate.getMonth() - 1);
            loadAssessments();
        });

        document.getElementById('nextMonth')?.addEventListener('click', () => {
            calendarDate.setMonth(calendarDate.getMonth() + 1);
            loadAssessments();
        });

        
        const timetableImages = {
            DCS5A: "{{ asset('images/timetables/DCS5A.jpeg') }}",
            DCS5B: "{{ asset('images/timetables/DCS5B.jpeg') }}",
            DCS5C: "{{ asset('images/timetables/DCS5C.jpeg') }}",
            DIA5A: "{{ asset('images/timetables/DIA5A.jpeg') }}",
            DIA5B: "{{ asset('images/timetables/DIA5B.jpeg') }}",
            DIA5C: "{{ asset('images/timetables/DIA5C.jpeg') }}"
        };

        document.getElementById('timetableClass').addEventListener('change', function () {

            const selectedClass = this.value;
            const content = document.getElementById('timetableContent');

            if (!selectedClass) {
                content.innerHTML = `
                    <div class="timetable-empty">
                        Please select a class to view its timetable.
                    </div>
                `;
                return;
            }

            content.innerHTML = `
                <h3 style="font-size:15px; margin-bottom:12px; color:#92264b;">
                    ${selectedClass} Permanent Timetable
                </h3>

                <img
                    src="${timetableImages[selectedClass]}"
                    alt="${selectedClass} Timetable"
                    class="timetable-image"
                    onclick="window.open(this.src, '_blank')"
                >

                <p style="font-size:12px; color:#806b77; margin-top:10px;">
                    Click image to view in larger size.
                </p>
            `;
        });


        loadAssessments();
        document.querySelector('[name="class"]').addEventListener('change', () => {
        renderCalendar();

        if (selectedDate) {
            showAssessments(selectedDate);
        }
    });
    </script>

</body>
</html>
