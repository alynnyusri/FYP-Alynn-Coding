
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | Assessment Scheduling</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #321322;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
        }

        .header, .form-card {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 26px;
            margin: 0 0 8px;
        }

        .muted {
            color: #806b77;
            font-size: 14px;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        input:focus, select:focus {
            outline: 2px solid #e8a7c0;
            border-color: #b52f60;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }

        .button {
            display: inline-block;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            background: #b52f60;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            background: #92264b;
        }

        .button-light {
            background: #fce7f0;
            color: #92264b;
        }

        .error {
            color: #c62828;
            font-size: 12px;
        }

        .notice {
            background: #fff0f5;
            border: 1px solid #f4dbe5;
            padding: 12px;
            border-radius: 8px;
            color: #806b77;
            font-size: 13px;
            line-height: 1.5;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 9px 18px;
            margin-bottom: 18px;
            background: #fce7f0;
            color: #92264b;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
        }

        .back-button:hover {
            background: #f8d5e3;
        }

        .back-icon {
            font-size: 18px;
            line-height: 1;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
    <main class="container">

        <header class="header">
            <a href="{{ route('admin.manage-users') }}" class="back-button">
                <span class="back-icon">←</span>
                Back
            </a>


            <h1>Edit User</h1>
            <p class="muted">
                Update the lecturer or student account details.
            </p>
        </header>

        <section class="form-card">

            <form method="POST"
                  action="{{ route('admin.manage-users.update', $user->id) }}">

                @csrf
                @method('PATCH')

                <div class="form-grid">

                    <div class="field full">
                        <label for="name">Full Name</label>
                        <input id="name" name="name" type="text"
                               value="{{ old('name', $user->name) }}" required>

                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="login_id">Login ID</label>
                        <input id="login_id" name="login_id" type="text"
                               value="{{ old('login_id', $user->login_id) }}"
                               required>

                        @error('login_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="role">Role</label>
                        <select id="role" name="role" required>
                            <option value="lecturer"
                                {{ old('role', $user->role) === 'lecturer' ? 'selected' : '' }}>
                                Lecturer
                            </option>

                            <option value="student"
                                {{ old('role', $user->role) === 'student' ? 'selected' : '' }}>
                                Student
                            </option>
                        </select>

                        @error('role')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="password">New Password (Optional)</label>
                        <input id="password" name="password" type="password"
                               minlength="8"
                               autocomplete="new-password"
                               placeholder="Leave blank to keep current password">

                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="course">Course</label>
                        <input id="course" name="course" type="text"
                               value="{{ old('course', $user->course) }}"
                               placeholder="e.g. Diploma in Computer Science">

                        @error('course')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="semester">Semester</label>
                        <input id="semester" name="semester" type="number"
                               min="1"
                               value="{{ old('semester', $user->semester) }}">

                        @error('semester')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="class">Class</label>
                        <input id="class" name="class" type="text"
                               value="{{ old('class', $user->class) }}"
                               placeholder="e.g. DCS5A">

                        @error('class')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="department">Department</label>
                        <input id="department" name="department" type="text"
                               value="{{ old('department', $user->department) }}"
                               placeholder="For lecturers">

                        @error('department')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <p class="notice">
                    Leave the password field blank if you do not want
                    to change the user's current password.
                </p>

                <div class="actions">
                    <button type="submit" class="button">
                        Update User
                    </button>

                    <a href="{{ route('admin.manage-users') }}"
                       class="button button-light">
                        Cancel
                    </a>
                </div>

            </form>
        </section>
    </main>
</body>
</html>
