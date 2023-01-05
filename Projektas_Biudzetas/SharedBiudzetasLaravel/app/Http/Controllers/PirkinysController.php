<?php

namespace App\Http\Controllers;

use App\Models\pirkinys;
use App\Http\Requests\StorepirkinysRequest;
use App\Http\Requests\UpdatepirkinysRequest;

class PirkinysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pirkiniai = Pirkinys::all();
        return view('pirkinys.index', ['pirkiniai' => $pirkiniai]);
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
     * @param  \App\Http\Requests\StorepirkinysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepirkinysRequest $request,$apsipirkimas,$produkas)
    {
        $pirkinys   =   new Pirkinys;
        $pirkinys->price    =   $request->price;
        $pirkinys->quantity =   $request->quantity;
        $pirkinys->deposit  =   $request->deposit;
        $pirkinys->sum      =   $pirkinys->quantity*($pirkinys->price+$pirkinys->deposit);
        $pirkinys->prekepaslauga_id =   $request->prekepaslauga_id;
        $pirkinys->save();
        $pirkinys->apsipirkimas()->associate($pirkinys);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function show(pirkinys $pirkinys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function edit(pirkinys $pirkinys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepirkinysRequest  $request
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepirkinysRequest $request, pirkinys $pirkinys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function destroy(pirkinys $pirkinys)
    {
        //
    }
}
