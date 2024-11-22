<?php

namespace App\Http\Controllers;

use App\Models\Permisson;
use Illuminate\Http\Request;

class PermissonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissons = Permisson::all();
        return view('admin.Permissons.index'  , compact('permissons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Permissons.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permisson::create([
            'validation' => $request->name

        ]
        );
        return redirect()->route('permissons.index')->with('message' , 'created_successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permisson $permisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permisson $permisson)
    {
        return view('admin.Permissons.edit',compact('permisson'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permisson $permisson)
    {
        $permisson->update([
            'validation' => $request->name
        ]);
        return redirect()->route('permissons.index')->with('message' , 'updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permisson $permisson)
    {
        $permisson->delete();
        return redirect()->back()->with('message' , 'Deleted Successfully');

    }
}
