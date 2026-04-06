@extends('layouts.app')

@section('title', 'Add Employee – Pampanga High School')
    
@push('styles')
    @vite(['resources/css/add_student.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'add-employee', 'fullWidth' => true])


    <main>
        
    {{-- Background wrapper --}}
    <div class="position-relative d-flex align-items-flex-start" style="min-height: 60vh; width: 100%;">

        {{-- Background image --}}
        <img src="{{ asset('images/phs.jpg') }}" alt=""
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 70%; z-index: -10;">

        {{-- Yellow overlay --}}
        <div class="position-absolute top-0 w-100 h-100"
             style="background-color: rgba(245,168,0, 0.7); z-index: -1;"></div>

        <div class="d-flex flex-column text-start mx-auto" style="z-index: 10; width: 100%; max-width: 1200px;">

        <header class=" mb-1 pt-5">
            <h1 class="fs-1" style="color: #333361;">Employee Records</h1>
            <p class="fs-5">Manage employee information and records</p>
        </header>

        <section class="card mb-5" style="border-radius: 0.75rem; border-color: #EEEE3D; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <div class="card-header mb-3 pt-3" style="background-color: #EEEE3D; border-top-left-radius: 0.75rem; border-top-right-radius: 0.75rem; border-color: #EEEE3D;">
            <h4 class="ps-2">Add New Employee</h4>
            </div>
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
            <div class="card-body px-4 pt-2 pb-4">
                <form class="form-grid" method="POST" action="{{ route('employees.store') }}">
                    @csrf
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label for="first_name" class="fw-medium mb-1">First Name <span class="required">*</span></label>
                            <input id="first_name" name="first_name" type="text" placeholder="Enter First Name" autocomplete="given-name" class="form-border mb-1 form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="middle_name" class="fw-medium mb-1">Middle Name</label>
                            <input id="middle_name" name="middle_name" type="text" placeholder="Enter Middle Name" autocomplete="additional-name" class="form-border form-control" value="{{ old('middle_name') }}">
                        </div>

                        <div class="col-12">
                            <label for="last_name" class="fw-medium mb-1">Last Name <span class="required">*</span></label>
                            <input id="last_name" name="last_name" type="text" placeholder="Enter Last Name" autocomplete="family-name" class="form-border mb-1 form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                        </div>

                        <div class="col-md-4">
                            <label for="position" class="fw-medium mb-1">Position <span class="required">*</span></label>
                            <input id="position" name="position" type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                        </div>
                        <div class="col-md-8">
                            <label for="department" class="fw-medium mb-1">Department</label>
                            <input id="department" name="department" type="text" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}">
                        </div>

                        <div class="col-md-8">
                            <label for="gender" class="fw-medium mb-1">Gender <span class="required">*</span></label>
                            <select id="gender" name="gender" autocomplete="sex" class="mb-1 form-select @error('gender') is-invalid @enderror">
                                <option value="" disabled selected hidden>Select Gender</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="province" class="fw-medium mb-1">Province <span class="required">*</span></label>
                            <div class="addr-wrap" id="province-wrap">
                                <input id="province" name="province" type="text" placeholder="Search province..." class="form-input addr-input @error('province') input-error @enderror" autocomplete="off" value="{{ old('province') }}">
                                <svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                                <ul class="addr-options" id="province-options"></ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="municipality" class="fw-medium mb-1">Municipality / City <span class="required">*</span></label>
                            <div class="addr-wrap addr-disabled" id="municipality-wrap">
                                <input id="municipality" name="municipality" type="text" placeholder="Select a province first..." class="form-input addr-input @error('municipality') input-error @enderror" autocomplete="off" value="{{ old('municipality') }}" disabled>
                                <svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                                <ul class="addr-options" id="municipality-options"></ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="town_barangay" class="fw-medium mb-1">Barangay <span class="required">*</span></label>
                            <div class="addr-wrap addr-disabled" id="barangay-wrap">
                                <input id="town_barangay" name="barangay" type="text" placeholder="Select a municipality first..." class="form-input addr-input @error('barangay') input-error @enderror" autocomplete="off" value="{{ old('barangay') }}" disabled>
                                <svg class="addr-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/></svg>
                                <ul class="addr-options" id="barangay-options"></ul>
                            </div>
                        </div>
                        
                        <div class="d-flex w-100">
                            <a href="{{ route('employees.index') }}"
                            class="btn w-50 rounded-3 me-3 p-2 fw-medium"
                            style="background-color: #d6d6d6; color: #222; border: none;">
                                Back
                            </a>
                            
                            <button type="submit"
                                    class="btn w-50 rounded-3 p-2 fw-medium"
                                    style="background-color: #f8f33a; color: #222; border: none;">
                                Add Employee
                            </button>
                        </div>
                </div>
            </div>

            </form>
        </section>
        </div>
</div>    
    </main>

    @include('partials.site_footer')
    <script>
        const addressUrl = '{{ url("address") }}';

        const state = {
            province:     { items: [], onPick: null },
            municipality: { items: [], onPick: null },
            barangay:     { items: [], onPick: null },
        };

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

        function unlockField(level, items, placeholder, onPick) {
            state[level].items        = items;
            state[level].onPick       = onPick;
            fields[level].disabled    = false;
            fields[level].placeholder = placeholder;
            wraps[level].classList.remove('addr-disabled');
        }

        function renderList(level) {
            const { items, onPick } = state[level];
            const q = fields[level].value.trim().toLowerCase();
            const filtered = items.filter(item => item.name.toLowerCase().includes(q)); 

            lists[level].innerHTML = '';
            if (filtered.length === 0) {
                lists[level].innerHTML = '<li class="addr-opt-empty">No results found</li>';
                return;
            }

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

        lockField('municipality', 'Select a province first...');
        lockField('barangay', 'Select a municipality first...');

        fetchData(`${addressUrl}/provinces`).then(rows => {
            unlockField('province', rows, 'Search province...', onProvincePick);
        });

        function onProvincePick(provinceCode) {
            lockField('municipality', 'Loading...');
            lockField('barangay', 'Select a municipality first...');

            fetchData(`${addressUrl}/provinces/${provinceCode}/municipalities`).then(rows => {
                unlockField('municipality', rows, 'Search municipality / city...', onMunicipalityPick);
            });
        }

        function onMunicipalityPick(municipalityCode) {
            lockField('barangay', 'Loading...');
            fetchData(`${addressUrl}/municipalities/${municipalityCode}/barangays`).then(rows => {
                unlockField('barangay', rows, 'Search barangay...', null);
            });
        }

        fields.province.addEventListener('input', () => {
            lockField('municipality', 'Select a province first...');
            lockField('barangay', 'Select a municipality first...');
        });
        fields.municipality.addEventListener('input', () => {
            lockField('barangay', 'Select a municipality first...');
        });
    </script>
@endsection
