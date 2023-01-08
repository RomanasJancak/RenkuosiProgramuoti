<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Apsipirkimas;
use App\Models\User;
use App\Models\pirkinys;
use App\Models\Prekepaslauga;
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
    public function create(Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        return view('pirkinys.create', ['budget' => $budget,'user' => $user,'apsipirkimas' => $apsipirkimas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepirkinysRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepirkinysRequest $request,$apsipirkimas,$budget,$user)
    {
        $pirkinys   =   new Pirkinys;
        $pirkinys->price    =   $request->price;
        $pirkinys->quantity =   $request->quantity;
        $pirkinys->deposit  =   $request->deposit;
        $pirkinys->sum      =   $pirkinys->quantity*($pirkinys->price+$pirkinys->deposit);
        $pirkinys->prekepaslauga_id =   $request->prekepaslauga_id;
        $pirkinys->apsipirkimas_id = $apsipirkimas;
        $pirkinys->save();
        $pirkinys->apsipirkimas()->associate($pirkinys);
        return redirect()->route('apsipirkimas.show',[$apsipirkimas,$budget,$user]);
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
