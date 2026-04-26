@extends('layouts.app')

@section('title', 'Verify Email – Pampanga High School')

@push('styles')
    @vite(['resources/css/register.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header-guest')

    <main>
    {{-- Background wrapper --}}
	<div class="position-relative d-flex align-items-flex-start" style="min-height: 60vh; width: 100%;">

		{{-- Background image --}}
		<img src="{{ asset('images/phs.jpg') }}" alt=""
			 style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 70%; z-index: -10;">

		{{-- Yellow overlay --}}
		<div class="position-absolute top-0 w-100 h-100"
			 style="background-color: rgba(245,168,0, 0.7); z-index: -1;"></div>


    <div class="d-flex align-items-center justify-content-center" style="min-height: 60vh; width: 100%;">

                    <div class="card shadow p-4 mt-5 mb-5" style="border-radius: 15px; width: 450px; max-width: 90%;" >

                    <h1 class="h2 pt-2 text-center" style="color: #41417F;">Verify Email</h1>
                    <p class="text-muted small mb-3 text-center">Student Management System</p>

                    <div class="step-indicator d-flex justify-content-center mb-2">
                        <div class="step done" style="background-color: #41417F; color: #ffffff;">1</div>
                        <div class="step-line mx-2"></div>
                        <div class="step done" style="background-color: #41417F; color: #ffffff;">2</div>
                        <div class="step-line mx-2"></div>
                        <div class="step active">3</div>
                    </div>
                    <p class="mb-3 small text-center text-muted">Step 3: Email Verification</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <p class="otp-info text-center text-muted mb-3">
                        We sent a 6-digit code to<br>
                        <strong style="color: #41417F;">{{ session('register_email') }}</strong>
                    </p>

                    <form action="{{ route('verification.submit') }}" method="POST">
                        @csrf

                        <div class="otp-group">
                            <div class="d-flex justify-content-center gap-2 mb-3">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" autofocus style="width:3.5rem;">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" style="width:3.5rem;">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" style="width:3.5rem;">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" style="width:3.5rem;">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" style="width:3.5rem;">
                                <input type="text" maxlength="1" class="form-control otp-input text-center" inputmode="numeric" pattern="[0-9]" style="width:3.5rem;">
                            </div>
                        </div>
                        <input type="hidden" name="otp" id="otp-hidden">

                        <div class="d-flex gap-2">
                            <a href="{{ route('register.step2') }}" class="btn-next p-2" style="background-color: #d3d3d3; border: none; width: 100%; border-radius: 5px; text-decoration: none; text-align: center; color: #000; font-weight: 600;">&#8592; Back</a>
                            <button type="submit" class="btn-next p-2" style="background-color: #eeee3d; border: none; width: 100%; border-radius: 5px; font-weight: 600;">Verify</button>
                        </div>
                    </form>

                    <div class="resend-link text-center mt-3 w-100" style="display: flex; justify-content: center; align-items: center; gap: 0.25rem;">
                        <span class="text-muted small">Didn't receive a code?</span>    
                        <form action="{{ route('verification.resend') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link p-0" style="font-size: inherit; color: #eeee3d; line-height: 2;">Resend OTP</button>
                        </form>
                    </div>

                    </div>

    </div>

    </div> <!-- End background wrapper -->
    </main>
    @include('partials.site_footer')

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

@endsection
