<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Student</title>
	@vite(['resources/css/site_header.css', 'resources/css/add_student.css'])
</head>
<body>
	@include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main class="add-main">
		<header class="add-page-header">
			<h1 class="add-title">Student Records</h1>
			<p class="add-subtitle">Manage student information and records</p>
		</header>

		<section class="form-card">
			<h2 class="form-heading">Add New Student</h2>

			@if(session('success'))
				<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			@if($errors->any())
				<div class="alert alert-error">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-grid" method="POST" action="{{ route('add-student.store') }}">
				@csrf
				<div class="form-group">
					<label for="first_name" class="form-label">First Name <span class="required">*</span></label>
					<input id="first_name" name="first_name" type="text" placeholder="Juan" class="form-input @error('first_name') input-error @enderror" value="{{ old('first_name') }}">
				</div>

				<div class="form-group">
					<label for="middle_name" class="form-label">Middle Name</label>
					<input id="middle_name" name="middle_name" type="text" placeholder="Santos" class="form-input" value="{{ old('middle_name') }}">
				</div>

				<div class="form-group col-full">
					<label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
					<input id="last_name" name="last_name" type="text" placeholder="Dela Cruz" class="form-input @error('last_name') input-error @enderror" value="{{ old('last_name') }}">
				</div>

				<div class="form-group">
					<label for="gender" class="form-label">Gender <span class="required">*</span></label>
					<select id="gender" name="gender" class="form-select">
						<option value="" disabled selected hidden>Select Gender</option>
						<option {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
						<option {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
					</select>
				</div>

				<div class="form-group">
					<label for="grade_level_id" class="form-label">Grade Level <span class="required">*</span></label>
					<select id="grade_level_id" name="grade_level_id" class="form-select @error('grade_level_id') input-error @enderror">
						<option value="" disabled selected hidden>Select Grade Level</option>
						@foreach($gradeLevels as $level)
							<option value="{{ $level->grade_level_id }}" {{ old('grade_level_id') == $level->grade_level_id ? 'selected' : '' }}>
								{{ $level->grade_level_name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-full">
					<label for="elementary_school" class="form-label">Elementary School <span class="required">*</span></label>
					<input id="elementary_school" name="elementary_school" type="text" placeholder="San Fernando Elementary School" class="form-input" value="{{ old('elementary_school') }}">
				</div>

				<div class="form-group">
					<label for="province" class="form-label">Province <span class="required">*</span></label>
					<div class="addr-wrap" id="province-wrap">
						<input id="province" name="province" type="text" placeholder="Search province..." class="form-input addr-input" autocomplete="off" value="{{ old('province') }}">
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="province-options"></ul>
					</div>
				</div>

				<div class="form-group">
					<label for="municipality" class="form-label">Municipality / City <span class="required">*</span></label>
					<div class="addr-wrap addr-disabled" id="municipality-wrap">
						<input id="municipality" name="municipality" type="text" placeholder="Select a province first..." class="form-input addr-input" autocomplete="off" value="{{ old('municipality') }}" disabled>
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="municipality-options"></ul>
					</div>
				</div>

				<div class="form-group col-full">
					<label for="town_barangay" class="form-label">Barangay <span class="required">*</span></label>
					<div class="addr-wrap addr-disabled" id="barangay-wrap">
						<input id="town_barangay" name="barangay" type="text" placeholder="Select a municipality first..." class="form-input addr-input" autocomplete="off" value="{{ old('barangay') }}" disabled>
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="barangay-options"></ul>
					</div>
				</div>

				<div class="btn-row">
					<a href="{{ route('home') }}" class="btn-cancel">Cancel</a>
					<button type="submit" class="btn-submit">Add Student</button>

				</div>
			</form>
		</section>
	</main>

	<script>
		const PSGC = 'https://psgc.gitlab.io/api';

		let provinceMap     = {};
		let municipalityMap = {};

		// ── Dropdown logic ──────────────────────────────────────
		function setupDropdown(wrapId, inputEl, optionsEl) {
			const wrap = document.getElementById(wrapId);

			function open() {
				if (inputEl.disabled) return;
				wrap.classList.add('open');
			}
			function close() {
				wrap.classList.remove('open');
			}
			function renderOptions(names, onSelect) {
				optionsEl.innerHTML = '';
				if (names.length === 0) {
					const li = document.createElement('li');
					li.className = 'addr-opt-empty';
					li.textContent = 'No results found';
					optionsEl.appendChild(li);
					return;
				}
				names.forEach(name => {
					const li = document.createElement('li');
					li.textContent = name;
					li.addEventListener('mousedown', e => {
						e.preventDefault();
						inputEl.value = name;
						close();
						onSelect(name);
					});
					optionsEl.appendChild(li);
				});
			}

			inputEl.addEventListener('focus', () => {
				open();
				const q = inputEl.value.trim().toLowerCase();
				const filtered = currentNames.filter(n => n.toLowerCase().includes(q));
				renderOptions(filtered, onPickCallback);
			});
			inputEl.addEventListener('blur',  () => close());
			inputEl.addEventListener('input', function () {
				open();
				const q = this.value.trim().toLowerCase();
				const filtered = currentNames.filter(n => n.toLowerCase().includes(q));
				renderOptions(filtered, onPickCallback);
			});

			let currentNames     = [];
			let onPickCallback   = () => {};

			function enable(names, onPick) {
				currentNames   = names;
				onPickCallback = onPick;
				optionsEl.innerHTML = '';
				inputEl.disabled = false;
				wrap.classList.remove('addr-disabled');
			}
			function disable(placeholder) {
				inputEl.value = '';
				inputEl.placeholder = placeholder;
				inputEl.disabled = true;
				wrap.classList.add('addr-disabled');
				optionsEl.innerHTML = '';
				close();
			}
			function setLoading() {
				optionsEl.innerHTML = '<li class="addr-opt-loading">Loading...</li>';
				wrap.classList.add('open');
			}

			return { enable, disable, setLoading, renderOptions: (n) => renderOptions(n, onPickCallback) };
		}

		// ── Wire up the three dropdowns ──────────────────────────
		const provinceInput     = document.getElementById('province');
		const municipalityInput = document.getElementById('municipality');
		const barangayInput     = document.getElementById('town_barangay');
		const provinceOpts      = document.getElementById('province-options');
		const municipalityOpts  = document.getElementById('municipality-options');
		const barangayOpts      = document.getElementById('barangay-options');

		const provinceDd     = setupDropdown('province-wrap',     provinceInput,     provinceOpts);
		const municipalityDd = setupDropdown('municipality-wrap', municipalityInput, municipalityOpts);
		const barangayDd     = setupDropdown('barangay-wrap',     barangayInput,     barangayOpts);

		// Load all provinces on page load
		fetch(`${PSGC}/provinces/`)
			.then(r => r.json())
			.then(data => {
				data.sort((a, b) => a.name.localeCompare(b.name));
				data.forEach(p => { provinceMap[p.name] = p.code; });
				const names = data.map(p => p.name);
				provinceDd.enable(names, (selected) => {
					const code = provinceMap[selected];
					if (!code) return;
					municipality_reset();
					municipality_load(code);
				});
			})
			.catch(() => console.error('Failed to load provinces.'));

		provinceInput.addEventListener('input', () => {
			municipality_reset();
			barangay_reset();
		});

		function municipality_reset() {
			municipalityMap = {};
			municipality_disabled();
			barangay_reset();
		}
		function municipality_disabled() {
			municipality_load_disabled();
			barangay_reset();
		}
		function municipality_load_disabled() {
			municipalityDd.disable('Select a province first...');
		}
		function barangay_reset() {
			barangayDd.disable('Select a municipality first...');
		}

		function municipality_load(provinceCode) {
			municipalityDd.disable('Loading...');
			fetch(`${PSGC}/provinces/${provinceCode}/cities-municipalities/`)
				.then(r => r.json())
				.then(data => {
					data.sort((a, b) => a.name.localeCompare(b.name));
					data.forEach(m => { municipalityMap[m.name] = m.code; });
					const names = data.map(m => m.name);
					municipality_input_placeholder_set(names);
					municipalityDd.enable(names, (selected) => {
						const code = municipalityMap[selected];
						if (!code) return;
						barangay_reset();
						barangay_load(code);
					});
				})
				.catch(() => console.error('Failed to load municipalities.'));
		}

		function municipality_input_placeholder_set(names) {
			municipalityInput.placeholder = names.length
				? 'Search municipality / city...'
				: 'No municipalities found';
		}

		function barangay_load(municipalityCode) {
			barangayInput.disabled = true;
			barangayInput.placeholder = 'Loading...';
			const wrap = document.getElementById('barangay-wrap');
			wrap.classList.remove('addr-disabled');
			fetch(`${PSGC}/cities-municipalities/${municipalityCode}/barangays/`)
				.then(r => r.json())
				.then(data => {
					data.sort((a, b) => a.name.localeCompare(b.name));
					const names = data.map(b => b.name);
					barangayDd.enable(names, () => {});
					barangayInput.placeholder = 'Search barangay...';
				})
				.catch(() => console.error('Failed to load barangays.'));
		}

		municipalityInput.addEventListener('input', () => barangay_reset());
	</script>
</body>
</html>
