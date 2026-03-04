<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home – Student Management System</title>
	@vite(['resources/css/home_dashboard.css', 'resources/css/site_header.css', 'resources/css/site_footer.css'])
</head>
<body>
	@include('partials.site_header', ['active' => 'home', 'fullWidth' => true])

	<main class="dashboard-main">

		<div class="welcome-section">
			<h1 class="welcome-title">Welcome back, {{ Auth::user()->first_name }}!</h1>
			<p class="welcome-subtitle">Manage and monitor student records from here.</p>
		</div>

		<div class="cards-grid">

			<a href="{{ route('students.index') }}" class="dash-card">
				<div class="dash-card__icon">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952l-1.66-2.117a5.25 5.25 0 1 0-8.172 0l-1.66 2.117A9.336 9.336 0 0 0 14.375 19.5c.9 0 1.77-.127 2.625-.372ZM15 10.5a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
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
</body>
</html>
