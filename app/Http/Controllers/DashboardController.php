<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shipment;
use App\Models\Business;
use App\Models\Hub;
use App\Models\Role;
use App\Models\Transaction;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userPermissons =  Auth::user()->role->permissons;
        $users = User::get();
         $filter_user = Role::where('name' , 'pilot')->with('users')->first();
        $shipments = Shipment::get();
        $bussiness =Business::get();
        $hubs = Hub::get();
        $transactions = Transaction::get();
        return view("admin.dashboard" , compact('userPermissons' , 'users' ,'shipments','bussiness','hubs','transactions' , 'filter_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
