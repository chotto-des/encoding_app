<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Records</title>
	@vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[#f8f7d8] text-slate-800">
	@include('partials.site_header', ['active' => 'home', 'fullWidth' => true])

	<main class="w-full px-8 lg:px-10 py-8">

		<header class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
			<div>
				<h1 class="text-[40px] leading-tight font-bold">Student Records</h1>
				<p class="text-slate-600 mt-1">Manage student information and records.</p>
			</div>

			<a
				href="/add-student"
				class="inline-flex items-center gap-2 justify-center rounded-xl bg-amber-400 px-6 py-3 text-xl font-semibold text-slate-900 shadow-md hover:bg-amber-300 transition-colors"
			>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952l-1.66-2.117a5.25 5.25 0 1 0-8.172 0l-1.66 2.117A9.336 9.336 0 0 0 14.375 19.5c.9 0 1.77-.127 2.625-.372ZM15 10.5a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
					<path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5h3m-1.5-1.5v3" />
				</svg>
				Add New Student
			</a>
		</header>

		<section class="bg-white border-2 border-amber-400 rounded-2xl shadow-sm overflow-hidden">
			<div class="overflow-x-auto">
				<table class="w-full text-xl">
					<thead class="bg-amber-400 text-slate-900">
						<tr>
							<th class="px-6 py-4 text-left font-semibold">Full Name</th>
							<th class="px-6 py-4 text-left font-semibold">Gender</th>
							<th class="px-6 py-4 text-left font-semibold">Elementary School</th>
							<th class="px-6 py-4 text-left font-semibold">Address</th>
							<th class="px-6 py-4 text-left font-semibold">Grade Level</th>
							<th class="px-6 py-4 text-left font-semibold">Actions</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-slate-200 bg-white">
						<tr>
							<td class="px-6 py-4">Maria Santos</td>
							<td class="px-6 py-4">Female</td>
							<td class="px-6 py-4">San Fernando Elementary School</td>
							<td class="px-6 py-4 leading-tight">Del Pilar, San Fernando<br>Pampanga</td>
							<td class="px-6 py-4"><span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-base">Grade 7</span></td>
							<td class="px-6 py-4">
								<div class="flex items-center gap-4">
									<button type="button" class="text-blue-500 hover:text-blue-600" aria-label="Edit">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 3.487 3.651 3.651M4.5 19.5l4.301-.956a2.25 2.25 0 0 0 1.08-.591L20.513 7.322a2.25 2.25 0 0 0 0-3.182l-.653-.653a2.25 2.25 0 0 0-3.182 0L6.047 14.119a2.25 2.25 0 0 0-.591 1.08L4.5 19.5Z" />
										</svg>
									</button>
									<button type="button" class="text-red-500 hover:text-red-600" aria-label="Delete">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.167-2.087-2.203a51.964 51.964 0 0 0-3.826 0c-1.178.036-2.087 1.022-2.087 2.203v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
										</svg>
									</button>
								</div>
							</td>
						</tr>
						<tr>
							<td class="px-6 py-4">Juan Dela Cruz</td>
							<td class="px-6 py-4">Male</td>
							<td class="px-6 py-4">Angeles City Central School</td>
							<td class="px-6 py-4 leading-tight">Balibago, Angeles City<br>Pampanga</td>
							<td class="px-6 py-4"><span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-base">Grade 10</span></td>
							<td class="px-6 py-4">
								<div class="flex items-center gap-4">
									<button type="button" class="text-blue-500 hover:text-blue-600" aria-label="Edit">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m16.862 3.487 3.651 3.651M4.5 19.5l4.301-.956a2.25 2.25 0 0 0 1.08-.591L20.513 7.322a2.25 2.25 0 0 0 0-3.182l-.653-.653a2.25 2.25 0 0 0-3.182 0L6.047 14.119a2.25 2.25 0 0 0-.591 1.08L4.5 19.5Z" />
										</svg>
									</button>
									<button type="button" class="text-red-500 hover:text-red-600" aria-label="Delete">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.167-2.087-2.203a51.964 51.964 0 0 0-3.826 0c-1.178.036-2.087 1.022-2.087 2.203v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
										</svg>
									</button>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>
	</main>
</body>
</html>
