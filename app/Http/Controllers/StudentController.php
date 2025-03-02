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
        Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select College', '');
        return view('students.edit', compact('student', 'colleges'));
    }

    public function update(Request $request, $id)
    {
        Log::info($request);
        $student = Student::findOrFail($id);
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
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        Log::info('Student deleted: ' . $id);
        return redirect()->route('students.index');
    }

    public function view($id)
    {
        $student = Student::findOrFail($id);
        return view('students.view', compact('student'));
    }
}
