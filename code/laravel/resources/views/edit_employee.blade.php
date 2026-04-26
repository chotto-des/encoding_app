@extends('layouts.app')

@section('title', 'Edit Employee – Pampanga High School')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Employee</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('employees.update', $employee) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control" id="province" name="province" value="{{ old('province', $employee->province) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="municipality" class="form-label">Municipality</label>
                                <input type="text" class="form-control" id="municipality" name="municipality" value="{{ old('municipality', $employee->municipality) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="barangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay" value="{{ old('barangay', $employee->barangay) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $employee->contact_number) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="education_level" class="form-label">Education Level</label>
                            <select class="form-control" id="education_level" name="education_level">
                                <option value="" disabled selected hidden>Select Education Level</option>
                                <option value="Elementary Graduate" {{ old('education_level', $employee->education_level) == 'Elementary Graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                                <option value="High School Undergraduate" {{ old('education_level', $employee->education_level) == 'High School Undergraduate' ? 'selected' : '' }}>High School Undergraduate</option>
                                <option value="High School Graduate" {{ old('education_level', $employee->education_level) == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                <option value="Senior High School Graduate" {{ old('education_level', $employee->education_level) == 'Senior High School Graduate' ? 'selected' : '' }}>Senior High School Graduate</option>
                                <option value="Vocational / TESDA Graduate" {{ old('education_level', $employee->education_level) == 'Vocational / TESDA Graduate' ? 'selected' : '' }}>Vocational / TESDA Graduate</option>
                                <option value="College Undergraduate" {{ old('education_level', $employee->education_level) == 'College Undergraduate' ? 'selected' : '' }}>College Undergraduate</option>
                                <option value="College Graduate" {{ old('education_level', $employee->education_level) == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                <option value="Master's Degree" {{ old('education_level', $employee->education_level) == 'Master\'s Degree' ? 'selected' : '' }}>Master's Degree</option>
                                <option value="Doctorate Degree (PhD / EdD)" {{ old('education_level', $employee->education_level) == 'Doctorate Degree (PhD / EdD)' ? 'selected' : '' }}>Doctorate Degree (PhD / EdD)</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
