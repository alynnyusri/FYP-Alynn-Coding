
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Assessment Scheduling Management System</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="login-page">

        <section class="brand-panel">
            <div class="brand-content">
                <div class="graduation-cap" aria-hidden="true">🎓</div>

                <h1>
                    ASSESSMENT<br>
                    SCHEDULING<br>
                    MANAGEMENT SYSTEM
                </h1>

                <p class="brand-description">
                    Manage assessment schedules efficiently
                    for a smarter academic planning.
                </p>
            </div>

            <div class="illustration" aria-hidden="true">
                <div class="leaf leaf-one"></div>
                <div class="leaf leaf-two"></div>

                <div class="books">
                    <div class="book book-one"></div>
                    <div class="book book-two"></div>
                    <div class="book book-three"></div>
                </div>

                <div class="calendar">
                    <div class="calendar-top"></div>

                    <div class="calendar-rings">
                        <span></span>
                        <span></span>
                    </div>

                    <div class="calendar-grid">
                        <i></i><i></i><i></i><i></i>
                        <i></i><i></i><i></i><i></i>
                        <i></i><i></i><i></i><i></i>
                    </div>

                    <div class="calendar-check">✓</div>
                </div>
            </div>
        </section>

        <section class="form-panel">
            <div class="login-card">

                <h2>Welcome Back!</h2>
                <p class="subtitle">
                    Login to access your assessment schedule
                </p>

                @if ($errors->any())
                    <div class="login-error" role="alert">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif        
                
            <form method="POST" action="{{ route('login.authenticate') }}">
                @csrf

                <label for="login_id">Student ID / Staff ID</label>
                <div class="input-field">
                    <span class="field-icon" aria-hidden="true">👤</span>
                    <input
                        type="text"
                        id="login_id"
                        name="login_id"
                        value="{{ old('login_id') }}"
                        placeholder="Enter your ID"
                        autocomplete="username"
                        required
                    >
                </div>

                @error('login_id')
                    <p class="error">{{ $message }}</p>
                @enderror

                <label for="password">Password</label>
                <div class="input-field">
                    <span class="field-icon" aria-hidden="true">🔒</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                    <button
                        type="button"
                        id="togglePassword"
                        class="toggle-password"
                        aria-label="Show password"
                    >◉</button>
                </div>

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror

                <button type="submit" class="login-button">Login</button>
            </form>

                <p class="login-note">
                    Secure access for authorised Admin, Lecturers
                    and Students.
                </p>

            </div>
        </section>

    </main>

    
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        if (passwordInput && togglePassword) {
            togglePassword.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';
                this.textContent = isPassword ? '◎' : '◉';

                this.setAttribute(
                    'aria-label',
                    isPassword ? 'Hide password' : 'Show password'
                );
            });
        }
    </script>
    </body>
    </html>

</body>
</html>
