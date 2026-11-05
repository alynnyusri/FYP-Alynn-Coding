
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Subject | Assessment Scheduling</title>

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
            font-family: Arial, sans-serif;
        }

        input:focus, select:focus {
            outline: none;
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

        .alert-error {
            color: #c62828;
            font-size: 12px;
            margin-bottom: 18px;
            background: #fde8e8;
            border: 1px solid #f5c2c2;
            border-radius: 8px;
            padding: 12px;
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

    <!-- PAGE HEADER -->
    <header class="header">

        <a href="{{ route('admin.subjects.index') }}" class="back-button">
            <span class="back-icon">←</span>
            Back
        </a>

        <h1>Edit Subject</h1>

        <p class="muted">
            Update subject information and department assignment.
        </p>

    </header>

    <!-- EDIT SUBJECT FORM -->
    <section class="form-card">

        @if($errors->any())
            <div class="alert-error">
                <strong>Please check the following errors:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('admin.subjects.update', $subject->id) }}"
        >
            @csrf
            @method('PUT')

            <div class="form-grid">

                <!-- SUBJECT CODE -->
                <div class="field">
                    <label for="subject_code">Subject Code</label>

                    <input
                        id="subject_code"
                        name="subject_code"
                        type="text"
                        value="{{ old('subject_code', $subject->subject_code) }}"
                        required
                    >

                    @error('subject_code')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- SUBJECT NAME -->
                <div class="field">
                    <label for="subject_name">Subject Name</label>

                    <input
                        id="subject_name"
                        name="subject_name"
                        type="text"
                        value="{{ old('subject_name', $subject->subject_name) }}"
                        required
                    >

                    @error('subject_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- DEPARTMENT -->
                <div class="field full">
                    <label for="department">Department</label>

                    <select id="department" name="department" required>

                        <option value="Account"
                            {{ old('department', $subject->department) === 'Account' ? 'selected' : '' }}>
                            Account
                        </option>

                        <option value="Computer Science"
                            {{ old('department', $subject->department) === 'Computer Science' ? 'selected' : '' }}>
                            Computer Science
                        </option>

                    </select>

                    @error('department')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="actions">

                <button type="submit" class="button">
                    Update Subject
                </button>

                <a href="{{ route('admin.subjects.index') }}"
                   class="button button-light">
                    Cancel
                </a>

            </div>

        </form>
    </section>

</main>

</body>
</html>
