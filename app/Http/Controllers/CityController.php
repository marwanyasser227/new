<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cites.index' , compact('cities'));

    }

    public function create()
    {
        $governates = Governate::all();

        return view('admin.cites.create' , compact('governates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        City::create([
            'name' => $request->name,
            'governate_id' => $request->governate_id,
        ]);
        return redirect()->route('cities.index')->with('message' , 'added successfully');
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
    public function edit(City $city)

    {
        $governates = Governate::all();

        return view('admin.cites.edit' , compact('city' , 'governates'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city->update([
            'name' => $request->name,
            'governate_id' => $request->governate_id,

        ]);

        return redirect()->route('cities.index')->with('message' ,'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with('message' , 'Deleted successfully');

    }
}
