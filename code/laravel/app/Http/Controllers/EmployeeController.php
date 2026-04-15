<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('last_name')->paginate(5);
        return view('employeepage', compact('employees'));
    }

    public function create()
    {
        return view('add_employee');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'nullable|string|unique:employees,employee_id',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'province' => 'required|string',
            'municipality' => 'nullable|string',
            'barangay' => 'nullable|string',
            'position' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
        ]);

        if (empty($data['employee_id'])) {
            $data['employee_id'] = 'EMP'.time();
        }

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('edit_employee', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'employee_id' => 'nullable|string|unique:employees,employee_id,' . $employee->id,
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'province' => 'required|string',
            'municipality' => 'nullable|string',
            'barangay' => 'nullable|string',
            'position' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
        ]);

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
