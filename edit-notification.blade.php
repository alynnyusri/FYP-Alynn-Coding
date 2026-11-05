<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notification</title>

    <style>
        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #321322;
        }

        .container {
            max-width: 650px;
            margin: 30px auto;
            padding: 28px;
            background: white;
            border: 1px solid #f4dbe5;
            border-radius: 14px;
        }

        h2 {
            color: #92264b;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: bold;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #e8cbd7;
            border-radius: 8px;
            font-family: Arial, sans-serif;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #b52f60;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back {
            background: #fff0f5;
            color: #92264b;
            border: 1px solid #f0cfdb;
        }

        .error {
            color: #b42323;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Notification</h2>
    <p>Update your draft notification details.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.notifications.update', $notification->id) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <label for="title">Notification Title</label>
        <input
            type="text"
            id="title"
            name="title"
            maxlength="100"
            value="{{ old('title', $notification->title) }}"
            required
        >

        <label for="recipient">Recipient</label>
        <select id="recipient" name="recipient" required>
            @foreach (['All Users', 'Lecturers', 'Students'] as $recipient)
                <option
                    value="{{ $recipient }}"
                    @selected(old('recipient', $notification->recipient) === $recipient)
                >
                    {{ $recipient }}
                </option>
            @endforeach
        </select>

        <label for="category">Category</label>
        <select id="category" name="category" required>
            @foreach ([
                'General Announcement',
                'Assessment Reminder',
                'Schedule Update',
                'Scheduling Conflict',
                'Important Notice'
            ] as $category)
                <option
                    value="{{ $category }}"
                    @selected(old('category', $notification->category) === $category)
                >
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <label for="notification_date">Notification Date</label>
        <input
            type="date"
            id="notification_date"
            name="notification_date"
            value="{{ old('notification_date', $notification->notification_date) }}"
            required
        >

        <label for="message">Message</label>
        <textarea
            id="message"
            name="message"
            maxlength="1000"
            required
        >{{ old('message', $notification->message) }}</textarea>

        <button type="submit">Save Changes</button>

        <a href="{{ route('admin.create-notification') }}" class="back">
            Cancel
        </a>
    </form>
</div>

</body>
</html>