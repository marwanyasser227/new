<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Customer;
use App\Models\Governate;
use App\Models\Type;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shipments = Shipment::all();
        return view('admin.shipments.index' , compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shipments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //! 001 set client data
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->phone2 = $request->phone2;
        $data = $customer;
        //! 002 return data to others
        return redirect()->route('shipments.createShipments')->with('data' , $data);

    }


    public function createShipments(){
        $types = Type::all();
        return view('admin.shipments.createShipments' , compact('types'));

    }
    public function storeShipments(Request $request){
        $governates = Governate::all();
        $data = $request->all();

        return view('admin.shipments.createShipmentLocation' , compact('governates' , 'data'));
    }

    public function createShimpentsLocations(Request $request){

        $client = json_decode($request->customerValue);


        //! 001 insert data into shipment
    }
    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
