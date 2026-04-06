@extends('layouts.app')

@section('title', 'Verify Email – Pampanga High School')

@push('styles')
    @vite(['resources/css/register.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header-guest')
    {{-- Background wrapper --}}
    <div class="position-relative d-flex align-items-center justify-content-center" style="min-height: 85vh;">

        {{-- Background image --}}
        <img src="{{ asset('images/phs.jpg') }}" alt=""
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;">

            {{-- Yellow overlay --}}
            <div class="position-absolute top-0 w-100 h-100"    
                style="background-color: rgba(245,168,0,0.70);"></div>

            <style>
                #btn-verify{
                    transition: background-color .12s ease, transform .06s ease, box-shadow .12s ease;
                }
                #btn-verify:hover{
                    background-color: #D7DA32!important;
                }
                #btn-verify:active{
                    transform: translateY(0);
                }
            </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow p-4 mx-auto">

                    <div class="d-flex justify-content-center mb-3">
                        <div class="icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="56" height="56">
                                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                    </div>

                    <h1 class="h4 mb-1 text-center">Verify Email</h1>
                    <p class="text-muted mb-3 text-center">Student Management System</p>

                    <div class="step-indicator d-flex justify-content-center mb-2">
                        <div class="step done">1</div>
                        <div class="step-line mx-2"></div>
                        <div class="step done">2</div>
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

                    <p class="otp-info text-center mb-3">
                        We sent a 6-digit code to<br>
                        <strong>{{ session('register_email') }}</strong>
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

                        <div class="step-buttons">
                            <a href="{{ route('register.step2') }}" class="btn-back">&#8592; Back</a>
                            <button type="submit" class="btn-register" id="btn-verify">Verify</button>
                        </div>
                    </form>

                    <div class="resend-link text-center mt-2 w-100">
                        <div class="text-muted small mb-1">Didn't receive a code?</div>
                        <form action="{{ route('verification.resend') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link p-0">Resend OTP</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
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
