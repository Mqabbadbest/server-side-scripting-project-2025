<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;
use Log;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        $college = new College();
        return view('colleges.create', compact('college'));
    }

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
        try {
            College::create($request->all());

        } catch (\Exception $e) {
            Log::error('Error creating college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error creating college: ' . $e->getMessage());
        }
        return redirect()->route('colleges.index');
    }

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

    public function update(Request $request, $id)
    {
        Log::info($request);
        try {
            $college = College::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Error finding college: ' . $e->getMessage());
            return redirect()->route('colleges.index')->with('danger', 'Error finding college: ' . $e->getMessage());
        }
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
