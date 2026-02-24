<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Student</title>
	@vite(['resources/css/app.css'])
</head>
<body class="h-screen overflow-hidden bg-[#f8f7d8] text-slate-800 flex flex-col">
	@include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main class="w-full px-8 lg:px-10 py-5 flex-1 min-h-0 flex flex-col">
		<header class="mb-4">
			<h1 class="text-4xl leading-tight font-bold">Student Records</h1>
			<p class="text-slate-600 mt-1">Manage student information and records</p>
		</header>

		<section class="bg-white border-3    border-amber-300 rounded-2xl shadow-sm p-5 md:p-6 flex-1 min-h-0 flex flex-col">
			<h2 class="text-3xl leading-tight font-semibold mb-3">Add New Student</h2>

			<form class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div>
					<label for="first_name" class="block text-base font-semibold text-slate-700 mb-2">First Name <span class="text-red-500">*</span></label>
					<input
						id="first_name"
						type="text"
						placeholder="Juan"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-700 placeholder:text-slate-400 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
				</div>

				<div>
					<label for="middle_name" class="block text-base font-semibold text-slate-700 mb-2">Middle Name</label>
					<input
						id="middle_name"
						type="text"
						placeholder="Santos"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-700 placeholder:text-slate-400 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
				</div>

				<div class="md:col-span-2">
					<label for="last_name" class="block text-base font-semibold text-slate-700 mb-2">Last Name <span class="text-red-500">*</span></label>
					<input
						id="last_name"
						type="text"
						placeholder="Dela Cruz"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-700 placeholder:text-slate-400 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
				</div>

				<div>
					<label for="gender" class="block text-base font-semibold text-slate-700 mb-2">Gender <span class="text-red-500">*</span></label>
					<select
						id="gender"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
						<option value="">Select Gender</option>
						<option>Female</option>
						<option>Male</option>
					</select>
				</div>

				<div>
					<label for="grade_level" class="block text-base font-semibold text-slate-700 mb-2">Grade Level <span class="text-red-500">*</span></label>
					<select
						id="grade_level"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
						<option value="">Select Grade Level</option>
						<option>Grade 7</option>
						<option>Grade 8</option>
						<option>Grade 9</option>
						<option>Grade 10</option>
					</select>
				</div>

				<div class="md:col-span-2">
					<label for="elementary_school" class="block text-base font-semibold text-slate-700 mb-2">Elementary School <span class="text-red-500">*</span></label>
					<input
						id="elementary_school"
						type="text"
						placeholder="San Fernando Elementary School"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-700 placeholder:text-slate-400 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
				</div>

				<div>
					<label for="province" class="block text-base font-semibold text-slate-700 mb-2">Province <span class="text-red-500">*</span></label>
					<select
						id="province"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
						<option>Pampanga</option>
					</select>
				</div>

				<div>
					<label for="municipality" class="block text-base font-semibold text-slate-700 mb-2">Municipality <span class="text-red-500">*</span></label>
					<select
						id="municipality"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
						<option value="">Select Municipality</option>
						<option>San Fernando</option>
						<option>Angeles City</option>
					</select>
				</div>

				<div class="md:col-span-2">
					<label for="town_barangay" class="block text-base font-semibold text-slate-700 mb-2">Town/Barangay <span class="text-red-500">*</span></label>
					<select
						id="town_barangay"
						class="w-full rounded-xl border border-slate-300 px-5 py-2.5 text-lg text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-amber-300"
					>
						<option value="">Select Barangay</option>
						<option>Del Pilar</option>
						<option>Balibago</option>
						<option>San Jose</option>
						<option>Sindalan</option>
						<option>Lara</option>
						<option>Dolores</option>
						<option>Maimpis</option>
					</select>
				</div>

				<div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-3 pt-2">
					<button
						type="button"
						class="w-full rounded-xl bg-amber-400 px-5 py-2.5 text-lg font-semibold text-slate-900 shadow-sm hover:bg-amber-300 transition-colors"
					>
						Add Student
					</button>

					<button
						type="button"
						class="w-full rounded-xl bg-slate-200 px-5 py-2.5 text-lg font-semibold text-slate-700 hover:bg-slate-300 transition-colors"
					>
						Cancel
					</button>
				</div>
			</form>
		</section>
	</main>
</body>
</html>
