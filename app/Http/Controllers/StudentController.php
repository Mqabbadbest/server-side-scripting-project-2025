<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use Log;

class StudentController extends Controller
{
    public function index()
    {
        $sort_options = [
            "" => "Sorting Options",
            "asc" => "Name (A-Z)",
            "desc" => "Name (Z-A)"
        ];
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        $students = Student::where(function ($query) {
            if ($college_id = request('college_id')) {
                $query->where('college_id', $college_id);
            }
        })->get();

        if (request('sort') == 'asc') {
            $students = $students->sortBy('name');
        } elseif (request('sort') == 'desc') {
            $students = $students->sortByDesc('name');
        }

        return view('students.index', compact('students', 'colleges', 'sort_options'));
    }

    public function create()
    {
        $student = new Student();
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select College', '');
        return view('students.create', compact('student', 'colleges'));
    }

    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'phone' => 'required|phone:MT,INTERNATIONAL',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id'
        ], [
            'name.required' => 'Student name is required.',
            'email.required' => 'Student email is required.',
            'email.regex' => 'Student email is invalid.',
            'phone.required' => 'Student phone is required.',
            'phone.phone' => 'Student phone is invalid.',
            'dob.required' => 'Student date of birth is required.',
            'dob.date' => 'Student date of birth is invalid.',
            'college_id.required' => 'College is required.',
            'college_id.exists' => 'College is invalid.'
        ]);
        Log::info('Student data is valid');
        try {
            Student::create($request->all());
        } catch (\Exception $e) {
            Log::error('Error creating student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error creating student: ' . $e->getMessage());
        }
        return redirect()->route('students.index')->with('message', 'Student created successfully.');
    }

    public function edit($id)
    {
        try {
            $student = Student::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding student: ' . $e->getMessage());
        }
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select College', '');
        return view('students.edit', compact('student', 'colleges'));
    }

    public function update(Request $request, $id)
    {
        Log::info($request);
        try {
            $student = Student::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding student: ' . $e->getMessage());
        }
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'phone' => 'required|phone:MT,INTERNATIONAL',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id'
        ], [
            'name.required' => 'Student name is required.',
            'email.required' => 'Student email is required.',
            'email.regex' => 'Student email is invalid.',
            'phone.required' => 'Student phone is required.',
            'phone.phone' => 'Student phone is invalid.',
            'dob.required' => 'Student date of birth is required.',
            'dob.date' => 'Student date of birth is invalid.',
            'college_id.required' => 'College is required.',
            'college_id.exists' => 'College is invalid.'
        ]);
        Log::info('Student data is valid');
        try {
            $student->update($request->all());
        } catch (\Exception $e) {
            Log::error('Error updating student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error updating student: ' . $e->getMessage());
        }
        return redirect()->route('students.index')->with('message', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding student: ' . $e->getMessage());
        }
        try {
            $student->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error deleting student: ' . $e->getMessage());
        }
        Log::info('Student deleted: ' . $id);
        return redirect()->route('students.index')->with('message', 'Student deleted successfully.');
    }

    public function view($id)
    {
        try {
            $student = Student::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding student: ' . $e->getMessage());
        }
        return view('students.view', compact('student'));
    }
}
