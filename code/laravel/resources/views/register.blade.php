@extends('layouts.app')

@section('title', 'Register – Pampanga High School')
	
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


    <div class="card">

        <h1>Create Account</h1>
        <p class="subtitle">Student Management System</p>

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

</div>
    @include('partials.site_footer')
    
@endSection
