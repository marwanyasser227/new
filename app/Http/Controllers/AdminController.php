<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $admins = User::with('role')->where('role_id' , '2')->get();
        return view('admin.users.admins.index',compact('admins'));
    }
}
