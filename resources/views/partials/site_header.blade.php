@php
	$innerClass = ($fullWidth ?? false)
		? 'site-header__inner site-header__inner--full'
		: 'site-header__inner site-header__inner--centered';
@endphp
<header class="site-header">
	<div class="{{ $innerClass }}">
		<div class="site-header__brand">
			<div class="site-header__logo">
				<img src="{{ asset('images/PHS-logo.png') }}" alt="PHS Logo">
			</div>
			<div>
				<h1 class="site-header__school-name">Pampanga High School</h1>
				<p class="site-header__system-name">Student Management System</p>
			</div>
		</div>

		<div class="site-header__actions">
			<p class="site-header__email">{{ Auth::user()->email ?? '' }}</p>
			<form method="POST" action="{{ route('logout') }}" style="margin:0">
				@csrf
				<button type="submit" class="btn-logout">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-7.5a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 6 21h7.5a2.25 2.25 0 0 0 2.25-2.25V15" />
						<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 12h12m0 0-3-3m3 3-3 3" />
					</svg>
					Logout
				</button>
			</form>
		</div>
	</div>
</header>