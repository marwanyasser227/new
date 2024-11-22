<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDeatil;
use App\Models\Pilot_Detail;
use App\Models\Role;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){

        $users = User::with('role')->get();
        return view('admin.users.general.index',compact('users'));
    }


    public function create(){

        $roles = Role::all();
        return view('admin.users.general.create' , compact('roles'));
    }


    public function show(User $user){

        return view('admin.users.general.show' , compact('user'));
    }
    public function store(CreateUserRequest $request){

        //! 001 => set the essential data for user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $done = $user->save();

        if($done){
        //! 002 => set optional data
        $userDetails = new UserDeatil;
        $userDetails->Fimage = 'avatar.jpg';
        $userDetails->phone = false;
        $userDetails->age = 0;
        $userDetails->user_id = $user->id;
        $userDetails->save();
        }

 

    return redirect()->route('users.index')->with('message' , 'created successfully');
    }

    public function edit($user){
         $data = User::with('details')->find($user);
         $roles = Role::all();


         return view('admin.users.general.edit' , compact('data' , 'roles'));
    }

    public function update(User $user , UserDeatil $userdetail  ,EditUserRequest $request){


        //! 001 => update essential data
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role,
            ]);






        return redirect()->back()->with('message' , 'updated Successfully');



    }


    public function destroy(User $user){
        if($user->details != null){

            $user->details->delete();
        }
        $user->delete();
        return redirect()->back()->with(['message' => 'deleted Successfully']);
    }
}
