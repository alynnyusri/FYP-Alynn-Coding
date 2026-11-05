
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Venue | Assessment Scheduling</title>

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

        .main {
            max-width: 850px;
            margin: 40px auto;
            padding: 25px;
        }

        .section {
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 13px;
            padding: 28px;
        }

        h1 {
            font-size: 27px;
            margin-top: 0;
        }

        .muted {
            color: #806b77;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            background: #b52f60;
            color: white;
            border: none;
            padding: 12px 17px;
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

        .error {
            color: #a12d35;
            font-size: 13px;
            margin-top: 6px;
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
            .main {
                margin: 15px auto;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <main class="main">
        <section class="section">
            <a href="{{ route('admin.manage-venues') }}" class="back-button">
                <span class="back-icon">←</span>
                Back
            </a>
            <h1>Edit Venue</h1>
            <p class="muted">
                Update the venue information below.
            </p>

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.manage-venues.update', $venue->id) }}"
                  method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="venue_name">Venue Name</label>
                    <input type="text"
                           id="venue_name"
                           name="venue_name"
                           value="{{ old('venue_name', $venue->venue_name) }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text"
                           id="location"
                           name="location"
                           value="{{ old('location', $venue->location) }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input type="number"
                           id="capacity"
                           name="capacity"
                           min="1"
                           value="{{ old('capacity', $venue->capacity) }}"
                           required>
                </div>

                <button type="submit" class="button">
                    Update Venue
                </button>

                <a href="{{ route('admin.manage-venues') }}"
                   class="button button-light">
                    Cancel
                </a>
            </form>
        </section>
    </main>
</body>
</html>
