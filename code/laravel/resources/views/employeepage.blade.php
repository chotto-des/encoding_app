@extends('layouts.app')

@section('title', 'Employees – Pampanga High School')

@push('styles')
    @vite(['resources/css/studentpage.css', 'resources/css/site_header.css'])
@endpush

@section('body')
    @include('partials.site_header', ['active' => 'employees', 'fullWidth' => true])

    <div class="position-relative d-flex align-items-flex-start" style="min-height: 60vh; width: 100%;">
        <img src="{{ asset('images/phs.jpg') }}" alt=""
             style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 70%;">
        <div class="position-absolute top-0 w-100 h-100" style="background-color: rgba(245,168,0, 0.7);"></div>

        <main class="home-main">
            <header class="page-header">
                <div>
                    <h1 class="fs-1 fw-bold" style="color: #333361">Employee Records</h1>
                    <p class="fs-5" style="color:white;">Manage employee information and records.</p>
                </div>
                <div class="search-actions-row">
                    <div class="search-bar-wrapper">
                        <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"/>
                        </svg>
                        <input type="text" id="employee-search" class="search-input" placeholder="Search...">
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('home') }}" class="btn-back-home">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Back to Home
                        </a>
                        <a href="{{ route('employees.create') }}" class="btn-add-student">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            Add New Employee
                        </a>
                    </div>
                </div>
            </header>

            <section class="table-card">
                <div class="table-wrapper">
                    <table class="student-table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}{{ $employee->middle_name ? ' ' . $employee->middle_name : '' }} {{ $employee->last_name }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->age }}</td>
                                <td class="address">
                                    {{ $employee->barangay }}, {{ $employee->municipality }}<br>
                                    {{ $employee->province }}
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="#" class="btn-edit" aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 3.487 3.651 3.651M4.5 19.5l4.301-.956a2.25 2.25 0 0 0 1.08-.591L20.513 7.322a2.25 2.25 0 0 0 0-3.182l-.653-.653a2.25 2.25 0 0 0-3.182 0L6.047 14.119a2.25 2.25 0 0 0-.591 1.08L4.5 19.5Z" />
                                            </svg>
                                        </a>
                                        <form id="delete-form-{{ $employee->id }}" action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-delete" aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.167-2.087-2.203a51.964 51.964 0 0 0-3.826 0c-1.178.036-2.087 1.022-2.087 2.203v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center; padding: 2rem; color: #94a3b8;">
                                        No employees found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    @include('partials.site_footer')

@endsection
