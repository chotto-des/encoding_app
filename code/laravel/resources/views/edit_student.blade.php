@extends('layouts.app')

@section('title', 'Edit Student')
	
@push('styles')
	@vite(['resources/css/add_student.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'add-student', 'fullWidth' => true])

	<main class="add-main">
		<header class="add-page-header">
			<h1 class="add-title">Student Records</h1>
			<p class="add-subtitle">Manage student information and records</p>
		</header>

		<section class="form-card">
			<h2 class="form-heading">Edit Student</h2>

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

			<form class="form-grid" method="POST" action="{{ route('students.update', $student) }}">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="first_name" class="form-label">First Name <span class="required">*</span></label>
					<input id="first_name" name="first_name" type="text" placeholder="First Name" autocomplete="given-name" class="form-input @error('first_name') input-error @enderror" value="{{ old('first_name', $student->first_name) }}">
				</div>

				<div class="form-group">
					<label for="middle_name" class="form-label">Middle Name</label>
					<input id="middle_name" name="middle_name" type="text" placeholder="Middle Name" autocomplete="additional-name" class="form-input" value="{{ old('middle_name', $student->middle_name) }}">
				</div>

				<div class="form-group col-full">
					<label for="last_name" class="form-label">Last Name <span class="required">*</span></label>
					<input id="last_name" name="last_name" type="text" placeholder="Last Name" autocomplete="family-name" class="form-input @error('last_name') input-error @enderror" value="{{ old('last_name', $student->last_name) }}">
				</div>

				<div class="form-group">
					<label for="gender" class="form-label">Gender <span class="required">*</span></label>
					<select id="gender" name="gender" autocomplete="sex" class="form-select">
						<option value="" disabled selected hidden>Select Gender</option>
						<option {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
						<option {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
					</select>
				</div>

				<div class="form-group">
					<label for="grade_level_id" class="form-label">Grade Level <span class="required">*</span></label>
					<select id="grade_level_id" name="grade_level_id" autocomplete="off" class="form-select @error('grade_level_id') input-error @enderror">
						<option value="" disabled selected hidden>Select Grade Level</option>
						@foreach($gradeLevels as $level)
							<option value="{{ $level->grade_level_id }}" {{ old('grade_level_id', $student->grade_level_id) == $level->grade_level_id ? 'selected' : '' }}>
								{{ $level->grade_level_name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="form-group col-full">
					<label for="elementary_school" class="form-label">Elementary School <span class="required">*</span></label>
					<input id="elementary_school" name="elementary_school" type="text" placeholder="Elementary School" autocomplete="off" class="form-input" value="{{ old('elementary_school', $student->elementary_school) }}">
				</div>

				<div class="form-group">
					<label for="province" class="form-label">Province <span class="required">*</span></label>
					<div class="addr-wrap" id="province-wrap">
						<input id="province" name="province" type="text" placeholder="Search province..." class="form-input addr-input @error('province') input-error @enderror" autocomplete="off" value="{{ old('province', $student->province) }}">
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="province-options"></ul>
					</div>
				</div>

				<div class="form-group">
					<label for="municipality" class="form-label">Municipality / City <span class="required">*</span></label>
					<div class="addr-wrap addr-disabled" id="municipality-wrap">
						<input id="municipality" name="municipality" type="text" placeholder="Select a province first..." class="form-input addr-input @error('municipality') input-error @enderror" autocomplete="off" value="{{ old('municipality', $student->municipality) }}" disabled>
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="municipality-options"></ul>
					</div>
				</div>

				<div class="form-group col-full">
					<label for="town_barangay" class="form-label">Barangay <span class="required">*</span></label>
					<div class="addr-wrap addr-disabled" id="barangay-wrap">
						<input id="town_barangay" name="barangay" type="text" placeholder="Select a municipality first..." class="form-input addr-input @error('barangay') input-error @enderror" autocomplete="off" value="{{ old('barangay', $student->barangay) }}" disabled>
						<svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
						<ul class="addr-options" id="barangay-options"></ul>
					</div>
				</div>

				<div class="btn-row">
					<a href="{{ route('students.index') }}" class="btn-cancel">Back</a>
					<button type="submit" class="btn-submit">Save Changes</button>

				</div>
			</form>
		</section>
	</main>

	@include('partials.site_footer')
	<script>
		const addressUrl = '{{ url("address") }}';

		// para i-store yung state ng bawat level ng address selection (province, municipality, barangay)
		// kasama na yung list ng options at yung onPick callback function na tatawagin kapag may napili sa list
		const state = {
			province:     { items: [], onPick: null },
			municipality: { items: [], onPick: null },
			barangay:     { items: [], onPick: null },
		};

		// para i-access yung fields, lists, at wraps ng bawat level nang mas madali sa mga functions below
		const fields = {
			province:     document.getElementById('province'),
			municipality: document.getElementById('municipality'),
			barangay:     document.getElementById('town_barangay'),
		};
		const lists = {
			province:     document.getElementById('province-options'),
			municipality: document.getElementById('municipality-options'),
			barangay:     document.getElementById('barangay-options'),
		};
		const wraps = {
			province:     document.getElementById('province-wrap'),
			municipality: document.getElementById('municipality-wrap'),
			barangay:     document.getElementById('barangay-wrap'),
		};

		//para sa pag lock ng field kapag walang napili sa previous field, at para ireset din yung value at placeholder
		function lockField(level, placeholder) {
			fields[level].value       = '';
			fields[level].placeholder = placeholder;
			fields[level].disabled    = true;
			lists[level].innerHTML    = '';
			state[level].items        = [];
			state[level].onPick       = null;
			wraps[level].classList.add('addr-disabled');
			wraps[level].classList.remove('open');
		}
		//para sa pag unlock ng field kapag nakapili na sa previous field, at para ipopulate yung options ng current field
		function unlockField(level, items, placeholder, onPick) {
			state[level].items        = items;
			state[level].onPick       = onPick;
			fields[level].disabled    = false;
			fields[level].placeholder = placeholder;
			wraps[level].classList.remove('addr-disabled');
		}
		//para i-render yung options sa dropdown list base sa current input value
		function renderList(level) {
			const { items, onPick } = state[level];
			const q = fields[level].value.trim().toLowerCase();
			const filtered = items.filter(item => item.name.toLowerCase().includes(q));

			lists[level].innerHTML = '';
			if (filtered.length === 0) {
				lists[level].innerHTML = '<li class="addr-opt-empty">No results found</li>';
				return;
			}
			// kapag may results, i-render lahat ng options sa list 
			filtered.forEach(item => {
				const li = document.createElement('li');
				li.textContent = item.name;
				li.addEventListener('mousedown', e => {
					e.preventDefault();
					fields[level].value = item.name;
					wraps[level].classList.remove('open');
					if (onPick) onPick(item.code);
				});
				lists[level].appendChild(li);
			});
		}

		// para i-toggle yung dropdown list kapag nag-focus o nag-input sa field, at para i-close yung list kapag nag-blur sa field
		['province', 'municipality', 'barangay'].forEach(level => {
			fields[level].addEventListener('focus', () => {
				if (!fields[level].disabled) {
					renderList(level);
					wraps[level].classList.add('open');
				}
			});
			fields[level].addEventListener('input', () => {
				renderList(level);
				wraps[level].classList.add('open');
			});
			fields[level].addEventListener('blur', () => {
				wraps[level].classList.remove('open');
			});
		});
		async function fetchData(url) {
			const res = await fetch(url);
			return res.json();
		}

		// Saved values from the database
		const savedProvince     = "{{ old('province', $student->province) }}";
		const savedMunicipality = "{{ old('municipality', $student->municipality) }}";
		const savedBarangay     = "{{ old('barangay', $student->barangay) }}";

		// flag para malaman kung nasa initial page load pa tayo (para di mag-show ng "Loading...")
		let initialLoad = true;

		// Start with all lower fields locked 
		// kung may saved values, walang placeholder na "Select a..." para di malito yung user
		lockField('municipality', savedMunicipality ? '' : 'Select a province first...');
		lockField('barangay',     savedBarangay     ? '' : 'Select a municipality first...');

		// kung may saved values, alisin yung grey/disabled during initial load
		if (savedMunicipality) {
			fields.municipality.disabled = false;
			wraps.municipality.classList.remove('addr-disabled');
		}
		if (savedBarangay) {
			fields.barangay.disabled = false;
			wraps.barangay.classList.remove('addr-disabled');
		}

		// pag-load ng page, i-fetch yung provinces para mapopulate yung province field
		fetchData(`${addressUrl}/provinces`).then(rows => {
			unlockField('province', rows, 'Search province...', onProvincePick);

			// kung may saved province, hanapin ang code nito at i-auto-load yung municipalities
			if (savedProvince) {
				fields.province.value = savedProvince;
				const match = rows.find(r => r.name === savedProvince);
				if (match) onProvincePick(match.code);
			}
		});

		// kapag nakapili na ng province, i-fetch yung municipalities para sa probinsya na yun
		function onProvincePick(provinceCode) {
			if (!initialLoad) {
				lockField('municipality', 'Loading...');
				lockField('barangay', 'Select a municipality first...');
			}

			fetchData(`${addressUrl}/provinces/${provinceCode}/municipalities`).then(rows => {
				unlockField('municipality', rows, 'Search municipality / city...', onMunicipalityPick);

				// kung may saved municipality, hanapin ang code nito at i-auto-load yung barangays
				if (savedMunicipality && initialLoad) {
					fields.municipality.value = savedMunicipality;
					const match = rows.find(r => r.name === savedMunicipality);
					if (match) onMunicipalityPick(match.code);
				}
			});
		}

		// kapag nakapili na ng municipality, i-fetch yung barangays para sa munisipyo na yun
		function onMunicipalityPick(municipalityCode) {
			if (!initialLoad) {
				lockField('barangay', 'Loading...');
			}
			fetchData(`${addressUrl}/municipalities/${municipalityCode}/barangays`).then(rows => {
				unlockField('barangay', rows, 'Search barangay...', null);

				// kung may saved barangay, ilagay na agad yung value
				if (savedBarangay && initialLoad) {
					fields.barangay.value = savedBarangay;
				}

				// tapos na ang initial load
				initialLoad = false;
			});
		}

		// para i-lock yung dependent fields kapag binago yung value ng province o municipality
		fields.province.addEventListener('input', () => {
			lockField('municipality', 'Select a province first...');
			lockField('barangay', 'Select a municipality first...');
		});
		// kapag binago yung value ng municipality, i-lock yung barangay field
		fields.municipality.addEventListener('input', () => {
			lockField('barangay', 'Select a municipality first...');
		});
	</script>
@endSectionS
