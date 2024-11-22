<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permisson;
class AsignPermissonController extends Controller
{

    public function assignPage(){
       $roles = Role::get();
       $permissons = Permisson::get();


        return view('admin.Permissons.assignPermisson' , compact(['roles','permissons']));

    }
    public function rolePermisson(Request $request ){
         $permisson_id = $request->permisson;
         $role_id = $request->role_id;

             return Role::find($role_id)->permissons()->attach($permisson_id);

        //  return redirect()->back()->with('message' , 'added successfully');
    }
}
