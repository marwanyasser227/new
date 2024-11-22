<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::all( );
        return view('admin.roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create([

            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('message','added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function Userlist( Request $request ,Role $role)
    {
        //! 001 => write filter query
        $userList = $role->users;
        return view('admin.roles.usersList' , compact('userList'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        return view('admin.roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name
        ]);
        return redirect()->route('roles.index')->with('message' , 'updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role= Role::find($id)->delete();

        return redirect()->back()->with('message' , 'deleted successfully');
    }
}
