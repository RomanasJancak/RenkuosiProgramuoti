<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Apsipirkimas;
use App\Models\User;
use App\Http\Requests\StoreapsipirkimasRequest;
use App\Http\Requests\UpdateapsipirkimasRequest;

class ApsipirkimasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apsipirkimai = Apsipirkimas::all();
        return view('apsipirkimas.index', ['apsipirkimai' => $apsipirkimai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Apsipirkimas $apsipirkimas)
    {
        //
        return view('apsipirkimas.create', ['apsipirkimas' => $apsipirkimas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreapsipirkimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapsipirkimasRequest $request,$budget)
    {
        //
        //dd($request);
        $apsipirkimas = new Apsipirkimas;
        $apsipirkimas->shop_id = $request->shop_id;
        $apsipirkimas->save();
        $apsipirkimas->budget()->attach($apsipirkimas);       
                
        return redirect()->route('budget.show',$budget);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function show(Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    //(Budget $budget,User $user)
    {
        //
        return view('apsipirkimas.show', ['budget' => $budget,'apsipirkimas'=>$apsipirkimas,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function edit(apsipirkimas $apsipirkimas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapsipirkimasRequest  $request
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapsipirkimasRequest $request, apsipirkimas $apsipirkimas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function destroy(apsipirkimas $apsipirkimas)
    {
        //
    }
}
