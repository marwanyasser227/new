<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Role;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.transcations.index' , compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $users = Role::get()->where('name' , 'admin')->first()->users;
          return view('admin.transcations.create' , compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Transaction::create([
            'transaction_number' => "LO".time(),
            'cash' => $request->cash,
            'owner_id' => $request->owner_id,
        ]);
        return redirect()->back()->with('message' , 'sended succesfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($transaction)
    {
        Transaction::find($transaction)->delete();
        return redirect()->back()->with('message' , 'deleted succesfully');

    }
}
