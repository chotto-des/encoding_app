@extends('layouts.app')

@section('title', 'Register – Pampanga High School')
    
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

        <div class="card shadow pt-4 ps-4 pe-4 pb-2 mt-4 mb-4" style="border-radius: 15px; width: 450px; max-width: 90%;" >


            <h1 class="h2 pt-2 text-center" style="color: #41417F;">Create Account</h1>
            <p class="text-muted small mb-3 text-center">Student Management System</p>

                <div class="step-indicator">
                    <div class="step done">1</div>
                    <div class="step-line"></div>
                    <div class="step active">2</div>
                    <div class="step-line"></div>
                    <div class="step">3</div>
                </div>
                
                <p class="mb-3 small text-center text-muted">Step 2: Account Information</p>

                @if ($errors->any())
                <div class="alert alert-danger p-2 mb-2" style="font-size: 0.85rem;">
                    @foreach ($errors->all() as $error)
                        <div style="margin: 2px 0;">{{ $error }}</div>
                    @endforeach
                </div>
                @endif

        <form action="{{ route('register.step2.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="your.email@example.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                     >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password', 'eye-icon-password')">
                        <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-wrapper">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Confirm your password"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', 'eye-icon-confirm')">
                        <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="d-flex gap-2 pt-1">
                <a href="{{ route('register') }}" class="btn-next p-2" style="background-color: #d3d3d3; border: none; width: 100%; border-radius: 5px; text-decoration: none; text-align: center; color: #000;">&#8592; Back</a>
                <button type="submit" class="btn-next p-2" style="background-color: #eeee3d; border: none; width: 100%; border-radius: 5px; ">Register</button>
            </div>
        </form>

        <p class="text-center mt-3 small">Already have an account? <a href="{{ route('login') }}" style="color: #eeee3d;">Login here</a></p>
        </div>

    </div>

    </div> <!-- End background wrapper -->
    </main>

    @include('partials.site_footer')

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46A11.804 11.804 0 001 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
            }
        }
    </script>

    <script>
        // Prevent automatic scroll restoration and ensure page loads at top
        if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
        document.addEventListener('DOMContentLoaded', function () {
            window.scrollTo(0, 0);
        });
    </script>

@endSection
