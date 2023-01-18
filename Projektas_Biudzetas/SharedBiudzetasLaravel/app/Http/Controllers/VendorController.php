<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index', ['vendors' => $vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        $vendor             =   new Vendor;
        $vendor->name       =   $request->name;
        $vendor->ChainName  =   $request->ChainName;
        $vendor->adress     =   $request->adress;
        $vendor->code       =   $request->code;
        $vendor->vatcode    =   $request->vatcode;
        $vendor->save();                    
        return redirect()->route('vendor.index',[]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorRequest  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->name       =   $request->name;
        $vendor->ChainName  =   $request->ChainName;
        $vendor->adress     =   $request->adress;
        $vendor->code       =   $request->code;
        $vendor->vatcode    =   $request->vatcode;
        $vendor->save();                    
        return redirect()->route('vendor.index',[]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        if($vendor->apsipirkimai->count()){
            return redirect()->route('vendor.index')->with('info_message', 'Trinti negalima, nes turi Apsipirkimų.');
        }
        $vendor->delete();
        return redirect()->route('vendor.index')->with('success_message', ' Sekmingai ištrintas.');
    
    }
}
