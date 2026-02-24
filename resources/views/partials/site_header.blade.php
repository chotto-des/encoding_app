<header class="w-full bg-white border-b-4 border-amber-400">
	@php
		$containerClass = ($fullWidth ?? false)
			? 'px-8 lg:px-10 py-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between'
			: 'max-w-6xl mx-auto px-6 py-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between';
	@endphp
	<div class="{{ $containerClass }}">
		<div class="flex items-center gap-3">
			<div class="h-11 w-11 rounded-full bg-amber-400 flex items-center justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="currentColor">
					<path d="M12 3 1 9l11 6 9-4.91V17h2V9L12 3Zm0 14L5.5 13.45V17L12 21l6.5-4v-3.55L12 17Z"/>
				</svg>
			</div>
			<div>
				<h1 class="text-[34px] leading-none font-semibold text-slate-800">Pampanga High School</h1>
				<p class="text-sm text-slate-500">Student Management System</p>
			</div>
		</div>

		<div class="flex items-center gap-4">
			<p class="text-sm text-slate-600 hidden md:block">katemeneses68@gmail.com</p>
			<button type="button" class="inline-flex items-center gap-2 rounded-lg bg-amber-400 px-4 py-2 font-semibold text-slate-900 hover:bg-amber-300 transition-colors">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-7.5a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 6 21h7.5a2.25 2.25 0 0 0 2.25-2.25V15" />
					<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 12h12m0 0-3-3m3 3-3 3" />
				</svg>
				Logout
			</button>
		</div>
	</div>
</header>