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

		<div class="row justify-content-center" style="background-color: #f8f7d8;">
			
 			<div class=" col-12 col-sm-6 col-md-4 col-lg-3 z-20 my-5 margin-card d-flex justify-content-center align-items-center">	
				
				<a href="{{ route('students.index') }}" class="h-100 card text-decoration-none text-dark border-gold pe-1 pt-3 pb-3 ps-3 rounded-4">
					<div class="card__icon">
						<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="#FFD700" class="bi bi-folder-fill p-3	 rounded-4 ms-3 mt-3" style="background-color: #f8f7d8;" viewBox="0 0 16 16">
						<path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172_2H2.5a1_1_0_0_0-1_.981z"/>
						</svg>			
					</div>

					<div class="card-body">
						<h2 class="fs-3 fw-bold" style="color: #333361;">Student Records</h2>	
						<p class="card-text">View, add, edit, and delete student information and enrollment records.</p>
					</div>

					<div class="d-flex justify-content-end">
						<svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#FFD700" stroke-width="2" class="me-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
						</svg>
					</div>
				</a>
			</div>

			<div class=" col-12 col-sm-6 col-md-4 col-lg-3 my-5 z-20 d-flex justify-content-center align-items-center">	
				
				<a href="{{ route('students.index') }}" class="h-100 card text-decoration-none text-dark border-gold pe-1 pt-3 pb-3 ps-3 rounded-4">
					<div class="card__icon">
						<svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="#FFD700" class="bi bi-folder-fill p-3	 rounded-4 ms-3 mt-3" style="background-color: #f8f7d8;" viewBox="0 0 16 16">
						<path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3m-8.322.12q.322-.119.684-.12h5.396l-.707-.707A1 1 0 0 0 6.172_2H2.5a1_1_0_0_0-1_.981z"/>
						</svg>			
					</div>

					<div class="card-body">
						<h2 class="fs-3 fw-bold" style="color: #333361;">Student Records</h2>	
						<p class="card-text">View, add, edit, and delete student information and enrollment records.</p>
					</div>
					
					<div class="d-flex justify-content-end">
						<svg width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="" stroke="#FFD700" stroke-width="2" class="me-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
						</svg>
					</div>
				</a>
			</div>
			
		</div>
	</main>

	@include('partials.site_footer')
	@endsection
