<?php

namespace App\Http\Controllers;

use App\Models\Governate;
use Illuminate\Http\Request;

class GovernateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governates = Governate::all();
        return view('admin.governates.index' , compact('governates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.governates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Governate::create([
            'name' => $request->name,
        ]);
        return redirect()->route('governate.index')->with('message' , 'added successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Governate $governate)
    // {
    //     return view('admin.governates.create');

    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Governate $governate)
    {
        return view('admin.governates.edit' , compact('governate'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Governate $governate)
    {
        $governate->update([
            'name' => $request->name,
        ]);

        return redirect()->route('governate.index')->with('message' ,'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Governate $governate)
    {
        $governate->delete();
        return redirect()->back()->with('message' , 'Deleted successfully');

    }
}
