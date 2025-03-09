<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Log;

class CollegeController extends Controller
{
    /**
     * Getting all colleges from the database and returning the view with the college data to be displayed in the table.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    /**
     * Returning the Create view for colleges.
     * Giving the view an empty college object as the form requires it.
     * This is telling the form that no data needs to be pre-filled.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

    /**
     * Storing the college data in the database after validating the request data.
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Log::info($request);
        /**
         * Validating the request data before storing it in the database.
         * If the validation fails, the user will be redirected back to the form with the validation errors.
         * The error messages defined here will be displayed on the form.
         * The name field is required and must be unique in the colleges table.
         * The address field is required.
         */
        $request->validate([
            'name' => 'required|unique:colleges,name',
            'address' => 'required',
        ], [
            'name.required' => 'College name is required.',
            'name.unique' => 'College name already exists.',
            'address.required' => 'College address is required.',
        ]);
        Log::info('College data successfully validated.');
        try {
            College::create($request->all());

        } catch (\Exception $e) {
            Log::error('Error creating college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error creating college: ' . $e->getMessage());
        }
        return redirect()->route('colleges.index');
    }

    /**
     * Returning the Edit view for colleges with the college data to be edited.
     * Giving the view the college object that needs to be edited.
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        try {
            $college = College::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding college: ' . $e->getMessage());
            return redirect()->back()->with('danger', 'Error finding college: ' . $e->getMessage());
        }
        return view('colleges.edit', compact('college'));
    }

    /**
     * Updating the college data in the database after validating the request data.
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        Log::info($request);
        //Searching for the college based on the id provided.
        try {
            $college = College::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error finding college: ' . $e->getMessage());
        }

        //Validating the request data before updating the college data in the database.
        //For this validation of checking the unique name, we need to exclude the current college id from the unique check.
        $request->validate([
            'name' => 'required|unique:colleges,name,' . $college->id,
            'address' => 'required',
        ], [
            'name.required' => 'College name is required.',
            'name.unique' => 'College name already exists.',
            'address.required' => 'College address is required.',
        ]);

        Log::info('College data to be updated successfully validated.');
        try {
            $college->update($request->all());
        } catch (\Exception $e) {
            Log::error('Error updating college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error updating college: ' . $e->getMessage());
        }
        return redirect()->route('colleges.index')->with('message', 'College updated successfully.');
    }

    /**
     * Deleting a college from the database based on the id provided.
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Log::info('College ID to be deleted: ' . $id);
        try {
            $college = College::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error finding college: ' . $e->getMessage());
        }
        try {
            $college->delete();
        } catch (\Exception $e) {
            Log::error('Error deleting college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error deleting college: ' . $e->getMessage());
        }
        Log::info('College deleted: ' . $id);
        return redirect()->route('colleges.index')->with('message', 'College deleted successfully.');
    }

    /**
     * Viewing a college based on the id provided.
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function view($id)
    {
        try {
            $college = College::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error finding college: ' . $e->getMessage());
        }
        return view('colleges.view', compact('college'));
    }
}
