<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the students with search and pagination
    public function index(Request $request) 
    {
        $search = $request->input('search'); // Get the search query from the request

        //if may search, filter the data, if not, get all students with pagination
        $students = Student::with('gradeLevel') 
            ->when($search, function ($query, $search) { // If there's a search query, filter the students by first name or last name
                $query->where('first_name', 'like', "%{$search}%") 
                      ->orWhere('middle_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"])
                      ->orWhereRaw("CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
            })
            ->paginate(5) 
            ->withQueryString();

        return view('studentpage', compact('students', 'search'));
    }

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

        return redirect()->route('students.index')
            ->with('success', "Student <strong>{$validated['first_name']} {$validated['last_name']}</strong> added successfully!");

    }

        public function destroy(Student $student)
        {
            $student->delete();

            return redirect()->route('students.index')
                ->with('success', 'Student deleted successfully.');
        }

        public function edit(Student $student)
        {
            $gradeLevels = GradeLevel::orderBy('grade_level_id')->get();
            return view('edit_student', compact('student', 'gradeLevels'));
        }

        public function update(Request $request, Student $student)
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

            $student->update($validated);

            return redirect()->route('students.index')
                ->with('success', "Student <strong>{$validated['first_name']} {$validated['last_name']}</strong> updated successfully!");
        }
}
