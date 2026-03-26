@extends('layouts.app')

@section('title', 'Register – Pampanga High School')

@push('styles')
    @vite(['resources/css/register.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header-guest')

    <div class="position-relative d-flex align-items-center justify-content-center register-wrapper">

        <img src="{{ asset('images/phs.jpg') }}" alt="" class="register-bg">
        <div class="register-overlay"></div>

        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-12 col-md-8 col-lg-6"> 
                    <div class="card shadow p-4 mx-auto">

                        <h1 class="h4 mb-1 text-center">Create Account</h1>
                        <p class="text-muted mb-3 text-center">Student Management System</p>

                        <div class="step-indicator">
                            <div class="step active">1</div>
                            <div class="step-line"></div>
                            <div class="step">2</div>
                            <div class="step-line"></div>
                            <div class="step">3</div>
                        </div>
                        <p class="mb-3 small text-center text-muted">Step 1: Personal Information</p>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="middle_name" class="form-label">Middle Name <span class="text-muted small">(Optional)</span></label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control" placeholder="Enter Middle Name" value="{{ old('middle_name') }}">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="extension_name" class="form-label">Extension Name <span class="text-muted small">(e.g. Jr., Sr., III)</span></label>
                                <input type="text" id="extension_name" name="extension_name" class="form-control" placeholder="Enter Extension Name (Optional)" value="{{ old('extension_name') }}">
                            </div>

                            <button type="submit" class="btn-next">Next</button>
                        </form>

                        <p class="text-center mt-3 small">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('partials.site_footer')

    <script>
        // Prevent automatic scroll restoration and ensure page loads at top
        if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
        document.addEventListener('DOMContentLoaded', function () {
            window.scrollTo(0, 0);
        });
    </script>

@endSection
