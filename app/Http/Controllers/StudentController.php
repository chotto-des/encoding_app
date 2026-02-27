<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $gradeLevels = GradeLevel::orderBy('grade_level_id')->get();
        return view('add_student', compact('gradeLevels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'        => 'required|string|max:255',
            'middle_name'       => 'nullable|string|max:255',
            'last_name'         => 'required|string|max:255',
            'grade_level_id'    => 'required|exists:grade_levels,grade_level_id',
            'elementary_school' => 'nullable|string|max:255',
            'province'          => 'nullable|string|max:255',
            'municipality'      => 'nullable|string|max:255',
            'barangay'          => 'nullable|string|max:255',
            'gender'            => 'required|in:Male,Female,Other',
        ]);

        Student::create($validated);

        return redirect()->route('add-student')
            ->with('success', "Student {$validated['first_name']} {$validated['last_name']} added successfully!");
    }
}
