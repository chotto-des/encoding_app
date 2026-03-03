<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - Pampanga High School</title>
    @vite('resources/css/register.css')
</head>
<body>

    <div class="card">
        <!-- Icon -->
        <div class="icon-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
        </div>

        <h1>Verify Email</h1>
        <p class="subtitle">Student Management System</p>

        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step done">1</div>
            <div class="step-line"></div>
            <div class="step done">2</div>
            <div class="step-line"></div>
            <div class="step active">3</div>
        </div>
        <p class="step-label">Step 3: Email Verification</p>

        <p class="otp-info">
            We sent a 6-digit code to<br>
            <strong>{{ session('register_email') }}</strong>
        </p>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('verification.submit') }}" method="POST">
            @csrf

            <div class="otp-group">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]" autofocus>
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]">
            </div>
            <input type="hidden" name="otp" id="otp-hidden">

            <button type="submit" class="btn-next" id="btn-verify">Verify</button>
        </form>

        <p class="resend-link">
            Didn't receive a code?
            <form action="{{ route('verification.resend') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn-resend">Resend OTP</button>
            </form>
        </p>
    </div>

    <script>
        const inputs = document.querySelectorAll('.otp-input');
        const hidden = document.getElementById('otp-hidden');

        inputs.forEach((input, i) => {
            input.addEventListener('input', () => {
                input.value = input.value.replace(/[^0-9]/g, '');
                if (input.value && i < inputs.length - 1) {
                    inputs[i + 1].focus();
                }
                syncHidden();
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && i > 0) {
                    inputs[i - 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const paste = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
                paste.split('').forEach((char, j) => {
                    if (inputs[j]) inputs[j].value = char;
                });
                const next = Math.min(paste.length, inputs.length - 1);
                inputs[next].focus();
                syncHidden();
            });
        });

        function syncHidden() {
            hidden.value = Array.from(inputs).map(i => i.value).join('');
        }

        document.querySelector('form').addEventListener('submit', syncHidden);
    </script>

</body>
</html>
