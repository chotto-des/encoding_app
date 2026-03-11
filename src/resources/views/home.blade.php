@extends('layouts.app')

@section('title', 'Home – Student Management System')
	
@push('styles')
    @vite(['resources/css/home_dashboard.css', 'resources/css/site_header.css', 'resources/css/site_footer.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main class="dashboard-main">

		<div class="welcome-section">
			<h1 class="welcome-title">Welcome back, {{ Auth::user()->first_name }}!</h1>
			<p class="welcome-subtitle">Manage and monitor student record from here.</p>
		</div>

		<div class="cards-grid">

			<a href="{{ route('students.index') }}" class="dash-card">
				<div class="dash-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
					</svg>
				</div>
				<div class="dash-card__body">
					<h2 class="dash-card__title">Student Records</h2>
					<p class="dash-card__desc">View, add, edit, and delete student information and enrollment records.</p>
				</div>
				<div class="dash-card__arrow">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
					</svg>
				</div>
			</a>

		</div>

	</main>

	@include('partials.site_footer')
	@endsection
