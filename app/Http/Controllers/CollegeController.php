<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Log;

class CollegeController extends Controller
{
    /**
     * Retrieve all colleges from the database and display them in the view.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Display the form for creating a new college.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    /**
     * Store a newly created college in the database after validating the request.
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Log::info($request);
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
        ], [
            'name.required' => 'College name is required.',
            'name.unique' => 'College name already exists.',
            'address.required' => 'College address is required.',
        ]);
        Log::info('College data successfully validated.');

        College::create($request->all());
        return redirect()->route('colleges.index');
    }

    /**
     * Display the form showing the data of the college to be edited.
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.edit', compact('college'));
    }

    /**
     * Update the college data in the database after validating the request.
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        $college = College::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college->id,
            'address' => 'required',
        ], [
            'name.required' => 'College name is required.',
            'name.unique' => 'College name already exists.',
            'address.required' => 'College address is required.',
        ]);

        Log::info('College data to be updated successfully validated.');
        $college->update($request->all());
        return redirect()->route('colleges.index');
    }
    
    public function destroy($id)
    {
        Log::info('College ID to be deleted: ' . $id);
        $college = College::findOrFail($id);
        $college->delete();
        
        return redirect()->route('colleges.index');
    }

    public function view($id)
    {
        $college = College::findOrFail($id);
        return view('colleges.view', compact('college'));
    }
}
