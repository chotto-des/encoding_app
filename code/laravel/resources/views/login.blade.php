@extends('layouts.app')

@section('title', 'Login – Pampanga High School')
	
@push('styles')
    @vite(['resources/css/site_header.css', 'resources/css/login.css'])
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

        {{-- Login Card --}}
        <div class="card p-4" style="width: 100%; max-width: 470px; border-radius: 0.75rem;">

        <span class="PHS-text fw-medium text-center" style="color: #41417F;">Pampanga High School</span>
        <p class="subtitle text-muted text-center mt-1">Student Management System</p>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email" class="extra-small-text fw-medium" style="color: #41417F;">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control py-3 mt-2 mb-2 "    
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password" class="extra-small-text fw-medium" style="color: #41417F;">Password</label>
                <div class="password-wrapper">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control password-input py-3 mt-2"
                        placeholder="Enter your password"
                        required
                    >
                    <button type="button" class="password-eye" onclick="togglePassword()" aria-label="Show password">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-lg w-100 mt-4 py-3" style="background-color: #EEEE3D; color: #41417F; border: none;">Login</button>
        </form>

        <p class="register-link text-center mt-4">
            Don't have an account? <a href="{{ route('register') }}" class ="register-link-color ">Register here</a>
        </p>
        
        </div>{{-- end card --}}

    </div>{{-- end background wrapper --}}

    @include('partials.site_footer')
    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46A11.804 11.804 0 001 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
            }
        }
    </script>
 
    

@endsection
