@extends('layouts.app')

@section('title', 'Home – Student Management System')
	
@push('styles')
	@vite(['resources/css/home_dashboard.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main>
		{{-- Top border --}}
		<div style="width: 100%; border-top: 10px solid #EEEE3D; box-shadow: 0 -6px 12px rgba(0, 0, 0, 0.3);"></div>

		{{-- Background wrapper --}}
		<div class="position-relative d-flex align-items-flex-start" style="min-height: 60vh; width: 100%;">

			{{-- Background image --}}
			<img src="{{ asset('images/phs.jpg') }}" alt=""
				style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 70%;">
	
				{{-- Yellow overlay --}}
				<div class="position-absolute top-0 w-100 h-100"    
					style="background-color: rgba(245,168,0,0.70);"></div>
					
			<div class="d-flex flex-column text-start" style="z-index: 10; margin-left: 5rem; align-self: center;">
				<h1 class="fw-medium welcome-text" style="color: #333361;">Welcome back, {{ Auth::user()->first_name }}!</h1>
				<p class="mt-n5 fs-5" style="color: #1E1E1E;">Manage and monitor student record from here.</p>
			</div>
			</div>
		</div>	

		<div style="width: 100%; border-bottom: 10px solid #EEEE3D; box-shadow: 0 -6px 12px rgba(0, 0, 0, 0.3);"></div>

		<div class="row" style="background-color: #f8f7d8;">
 		<div class=" col-12 col-sm-6 col-md-4 col-lg-3 m-5">
				
				<a href="{{ route('students.index') }}" class="h-100 card text-decoration-none text-dark border-card p-3 rounded-4">
				<div class="card__icon">
					<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
					</svg>

				</div>
				<div class="card-body">
					<h2 class="card-title">Student Records</h2>	
					<p class="card-text">View, add, edit, and delete student information and enrollment records.</p>
				</div>
				<div class="card-arrow">
					<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="align-self-end">
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
					</svg>
				</div>
			</a>
		</div>
	</main>

	@include('partials.site_footer')
	@endsection
