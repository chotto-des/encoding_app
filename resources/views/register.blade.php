<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pampanga High School</title>
    @vite('resources/css/register.css')
</head>
<body>

    <div class="card">
        <!-- Icon -->
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
            </svg>
        </div>

        <h1>Create Account</h1>
        <p class="subtitle">Student Management System</p>

        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step active">1</div>
            <div class="step-line"></div>
            <div class="step">2</div>
            <div class="step-line"></div>
            <div class="step">3</div>
        </div>
        <p class="step-label">Step 1: Personal Information</p>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name"
                    placeholder="Enter First Name" value="{{ old('first_name') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name <span class="optional">(Optional)</span></label>
                <input type="text" id="middle_name" name="middle_name"
                    placeholder="Enter Middle Name" value="{{ old('middle_name') }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"
                    placeholder="Enter Last Name" value="{{ old('last_name') }}"
                    required autofocus>
            </div>

            <div class="form-group">
                <label for="extension_name">Extension Name <span class="optional">(e.g. Jr., Sr., III)</span></label>
                <input type="text" id="extension_name" name="extension_name"
                    placeholder="Enter Extension Name (Optional)" value="{{ old('extension_name') }}">
            </div>

            <button type="submit" class="btn-next">Next</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>

</body>
</html>
