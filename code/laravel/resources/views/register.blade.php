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
                        <div class="step active">1</div>
                        <div class="step-line"></div>
                        <div class="step">2</div>
                        <div class="step-line"></div>
                        <div class="step">3</div>
                    </div>
                    <p class="mb-3 small text-center text-muted">Step 1: Personal Information</p>
                    
                        @if ($errors->any())
                        <div class="alert alert-danger p-2 mb-2" style="font-size: 0.85rem;">
                            @foreach ($errors->all() as $error)
                                <div style="margin: 2px 0;">{{ $error }}</div>
                            @endforeach
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

                    <button type="submit" class="btn-next p-2" style="background-color: #eeee3d; border: none; width: 100%; border-radius: 5px; " >Next</button>
                </form>
                    
                <p class="text-center mt-3 text-muted small">Already have an account? <a href="{{ route('login') }}" style="color: #eeee3d;">Login here</a></p>
            </div>
        </div>
    </div> <!-- End background wrapper -->  
    <main>
    

    @include('partials.site_footer')

    <script>
        // Prevent automatic scroll restoration and ensure page loads at top
        if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
        document.addEventListener('DOMContentLoaded', function () {
            window.scrollTo(0, 0);
        });
    </script>

@endSection
