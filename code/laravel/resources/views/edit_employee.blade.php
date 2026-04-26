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
                            <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" required>
                            @error('employee_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name) }}" required>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name) }}" required>
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="province" class="form-label">Province</label>
                                <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ old('province', $employee->province) }}" required>
                                @error('province')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="municipality" class="form-label">Municipality</label>
                                <input type="text" class="form-control @error('municipality') is-invalid @enderror" id="municipality" name="municipality" value="{{ old('municipality', $employee->municipality) }}">
                                @error('municipality')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="barangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control @error('barangay') is-invalid @enderror" id="barangay" name="barangay" value="{{ old('barangay', $employee->barangay) }}">
                                @error('barangay')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth <span class="required">*</span></label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" required>
                                @error('date_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_number" class="form-label">Contact Number <span class="required">*</span></label>
                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" name="contact_number" value="{{ old('contact_number', $employee->contact_number) }}" required>
                                @error('contact_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="education_level" class="form-label">Education Level <span class="required">*</span></label>
                            <select class="form-control @error('education_level') is-invalid @enderror" id="education_level" name="education_level" required>
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
                            @error('education_level')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
