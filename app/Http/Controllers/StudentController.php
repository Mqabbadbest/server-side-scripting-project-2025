<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\College;
use Log;

class StudentController extends Controller
{
    /**
     * Getting student data from the database based on the sorting and college filters provided.
     * Then returning the view with the student data, college information that will be used in the filter, and sorting options.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sort_options = [
            "" => "Sorting Options",
            "asc" => "Name (A-Z)",
            "desc" => "Name (Z-A)"
        ];
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('All Colleges', '');
        // Getting students based on the college filter
        $students = Student::where(function ($query) {
            if ($college_id = request('college_id')) {
                $query->where('college_id', $college_id);
            }
        })->get();
        // Then sorting the students based on the sorting option provided from the query string
        if (request('sort') == 'asc') {
            $students = $students->sortBy('name');
        } elseif (request('sort') == 'desc') {
            $students = $students->sortByDesc('name');
        }

        return view('students.index', compact('students', 'colleges', 'sort_options'));
    }

    /**
     * Returning the Create view for students with the college information that will be used in the college dropdown.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // Giving the view an empty student object as the form requires it. 
        // This is telling the form that no data needs to be pre-filled.
        $student = new Student(); 
        $colleges = College::orderBy('name')->pluck('name', 'id')->prepend('Select College', '');
        return view('students.create', compact('student', 'colleges'));
    }

    /**
     * Storing the student data in the database after validating the request data.
     * @param \Illuminate\Http\Request $request The request object that contains the student data.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        /**
         * Validating the request data before storing it in the database.
         * If the validation fails, the user will see the error messages defined here on the form.
         * The name, email, phone, dob, and college_id fields are required.
         * The email field must be a valid email address.
         * The phone field must be a valid Maltese or International phone number.
         * The dob field must be a valid date.
         * The college_id field must be a valid college id.
         */
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
            //If for some reason the student creation fails, the user will be redirected back to the create page with an error message.
            return redirect()->back()->with('danger', 'Error creating student: ' . $e->getMessage());
        }
        // Redirecting the user to the students index page with a success message.
        return redirect()->route('students.index')->with('message', 'Student created successfully.');
    }
    /**
     * Getting the student data from the database based on the id provided.
     * Then returning the edit view with the student data and college information that will be used in the college dropdown.
     * This time the form will be pre-filled with the student data.
     * @param string $id The id of the student to be edited.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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

    /**
     * Updating the student data in the database after validating the request data.
     * @param \Illuminate\Http\Request $request The request object that contains the updated student data.
     * @param string $id The id of the student to be updated.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        try {
            $student = Student::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding student: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding student: ' . $e->getMessage());
        }
        //The same validation rules as the store method are used here.
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

    /**
     * Deleting a student from the database based on the id provided.
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Getting the student data from the database based on the id provided.
     * Then returning the view with the student data.
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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
