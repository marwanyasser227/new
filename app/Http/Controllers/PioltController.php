<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class PioltController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pilots = Role::get()->where('name' , 'pilot')->first()->users;
        return view('admin.users.pilots.index',compact('pilots'));
    }


}
