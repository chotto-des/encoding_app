@extends('layouts.app')

@section('title', 'Employee Records – Pampanga High School')

@push('styles')
    @vite(['resources/css/studentpage.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'employees', 'fullWidth' => true])


        {{-- Background wrapper --}}
    <div class="position-relative d-flex align-items-flex-start" style="min-height: 60vh; width: 100%;">

        {{-- Background image --}}
        <img src="{{ asset('images/phs.jpg') }}" alt=""
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 70%; z-index: -10;">

        {{-- Yellow overlay --}}
        <div class="position-absolute top-0 w-100 h-100"
             style="background-color: rgba(245,168,0, 0.7); z-index: -1;"></div>

    <main class="w-100">

        <header class="pt-4 ps-5 mt-3 pe-5">
            <div>
                <h1 class="fs-1	fw-medium " style="color: #333361">Employee Records</h1>
                <p class="fs-5">Manage employee information and records.</p>
            </div>

            <div class="row mt-3 align-items-center justify-content-between">
                <div class="col" style="max-width: 750px;">
                    <div class="position-relative w-100">
                        <input type="text" id="employee-search" class="search-input"
                               placeholder="Search..."
                               style="border-radius: 16px; padding-right: 40px; padding-left: 12px; border: 2px solid #eeee3d; background: #fff; color: #333361;">
                        <button id="employee-search-btn" type="button" class="position-absolute d-flex align-items-center bg-transparent border-0 p-0"
                                style="right: 16px; top: 50%; transform: translateY(-50%); color: #979c3a; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-auto d-flex gap-2">
                    <a href="{{ route('home') }}" class="btn btn-light d-inline-flex align-items-center" style="border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); border: none; font-weight: 500; padding: 0.5rem 1.25rem; min-height: 44px; color: #333361;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18" class="me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Back to Home
                    </a>
                    <a href="{{ route('employees.create') }}" class="btn btn-warning d-inline-flex align-items-center" style="border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border: none; font-weight: 500; background: #EEEE3D; color: #333361; padding: 0.5rem 1.25rem; min-height: 44px;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        Add New Employee
                    </a>
                </div>
            </div>
        </header>

        <section class="ps-5 mt-3 pe-5 pb-4">
            <div class="card overflow-hidden" style="min-height: 450px; border-color: #EEEE3D; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <table class="student-table">
                    <thead class="card-header pt-3 fs-5" style="background-color: #EEEE3D; border-top-left-radius: 0.75rem; border-top-right-radius: 0.75rem; border-color: #EEEE3D;">
                        <tr>
                            <th>Full Name</th>
                            <th>Date of Birth</th>
                            <th>Contact Number</th>
                            <th>Education Level</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td>{{ $employee->first_name }}{{ $employee->middle_name ? ' ' . $employee->middle_name : '' }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('m/d/y') : '-' }}</td>
                            <td>{{ $employee->contact_number ?? '-' }}</td>
                            <td>{{ $employee->education_level ?? '-' }}</td>
                            <td class="address">
                                {{ $employee->barangay }}, {{ $employee->municipality }}<br>
                                {{ $employee->province }}
                            </td>

                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn-edit" aria-label="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 3.487 3.651 3.651M4.5 19.5l4.301-.956a2.25 2.25 0 0 0 1.08-.591L20.513 7.322a2.25 2.25 0 0 0 0-3.182l-.653-.653a2.25 2.25 0 0 0-3.182 0L6.047 14.119a2.25 2.25 0 0 0-.591 1.08L4.5 19.5Z" />
                                        </svg>
                                    </a>
                                    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" aria-label="Delete" data-bs-toggle="modal" data-bs-target="#delete-modal" onclick="openDeleteModal('{{ $employee->id }}', '{{ $employee->first_name }} {{ $employee->last_name }}')" style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: none; border: none; padding: 0; color: #ef4444; transition: background 0.15s;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.167-2.087-2.203a51.964 51.964 0 0 0-3.826 0c-1.178.036-2.087 1.022-2.087 2.203v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr style="border-bottom: 1px solid #dee2e6;">
                                <td colspan="6" style="text-align:center; padding: 2rem; color: #94a3b8;">
                                    No employees found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        {{ $employees->links('partials.pagination') }}

        </section>

    </main>
    </div> <!-- End background wrapper -->

        @if(session('success'))
    <div id="success-modal" class="modal fade show" tabindex="-1" style="display: block;">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #eeee3b; border: none; text-align: center; justify-content: center;">
                    <h5 class="modal-title" style="color: #0f172a; font-weight: 600;">Success</h5>
                </div>
                <div class="modal-body pb-0 mb-0" style="text-align: center;">
                    <p class="fs-5 pb-0 mb-1">{!! session('success') !!}</p>
                </div>
                <div class="modal-footer mb-1" style="border: none; justify-content: center;">
                <button type="button" class="btn btn-secondary" style="background-color: #eeee3b; border: none; color: #0f172a; font-weight: 500;" onclick="location.reload()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop show"></div>
    @endif

    <div id="delete-modal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #eeee3b; border: none; text-align: center; justify-content: center;">
                    <h5 class="modal-title" style="color: #0f172a; font-weight: 600;">Delete Employee</h5>
                </div>
                <div class="modal-body pb-0 mb-0" style="text-align: center;">
                    <p>Are you sure you want to delete</p>
                    <p id="modal-employee-name" class="fs-5 pb-0 mb-1" style="font-weight: 600; color: #0f172a;"></p>
                </div>
                <div class="modal-footer mb-1" style="border: none; justify-content: center; gap: 1rem;">
                    <button type="button" class="btn btn-secondary" style="background-color: #eeee3b; border: none; color: #0f172a; font-weight: 500;" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" style="border: none; font-weight: 500;" onclick="submitDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteModalInstance = null;

        // Initialize Bootstrap modals once
        document.addEventListener('DOMContentLoaded', function() {
            // Delete modal
            const deleteModalElement = document.getElementById('delete-modal');
            if (deleteModalElement) {
                deleteModalInstance = new bootstrap.Modal(deleteModalElement);
            }
        });

        //delete modal
        let currentFormId = null;// Store the ID of the employee to be deleted when opening the modal

        function openDeleteModal(id, name) {
            currentFormId = id;
            document.getElementById('modal-employee-name').textContent = name + '?';
        }

        function submitDelete() {
            if (currentFormId) {
                // Clear search and reset filter after delete
                var searchInput = document.getElementById('employee-search');
                if (searchInput) {
                    searchInput.value = '';
                }
                filterEmployees();
                document.getElementById('delete-form-' + currentFormId).submit();
            }
        }

        // Search filter
        function filterEmployees() {
            
            const query = document.getElementById('employee-search').value.toLowerCase().trim(); // kukunin yung tinype ng user sa search box, gagawing lowercase at tatanggalin ang extra spaces para mas accurate ang search
            const rows = document.querySelectorAll('.student-table tbody tr');  // Kukunin lahat ng rows sa employee table
            rows.forEach(function (row) {
                const text = row.textContent.toLowerCase();// Gagawing lowercasen yung text sa row para macompare sa query
                row.style.display = text.includes(query) ? '' : 'none';// isshow yungrow na may match sa query, itatago yung rows na walang match
            });
        }

        var searchInput = document.getElementById('employee-search');
        var searchBtn = document.getElementById('employee-search-btn');
        // Filter on button click or Enter
        if (searchBtn) {
            searchBtn.addEventListener('click', filterEmployees);
        }
        if (searchInput) {
            searchInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    filterEmployees();
                }
            });
            // If input is cleared, show all rows immediately
            searchInput.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    filterEmployees();
                }
            });
        }
    </script>

    @include('partials.site_footer')

@endsection
