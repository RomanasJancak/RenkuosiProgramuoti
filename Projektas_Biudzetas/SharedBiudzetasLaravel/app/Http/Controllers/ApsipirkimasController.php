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
    public function create(Budget $budget,User $user)
    {
        //
        return view('apsipirkimas.create', ['budget' => $budget,'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreapsipirkimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapsipirkimasRequest $request,$budget,$user)
    {
        //
        //dd($request);
        $apsipirkimas = new Apsipirkimas;
        $apsipirkimas->vendor_id = $request->vendor_id;
        $apsipirkimas->suma = $request->suma;
        $apsipirkimas->shop_time = $request->shop_time;
        $apsipirkimas->budget_id = $budget;
        $apsipirkimas->save();
        $apsipirkimas->budget()->associate($apsipirkimas);       
                
        return redirect()->route('budget.show',[$budget,$user]);
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
        return view('apsipirkimas.show', ['apsipirkimas'=>$apsipirkimas,'budget' => $budget,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function edit(Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        //
        return view('apsipirkimas.edit', ['apsipirkimas'=> $apsipirkimas,'budget' => $budget,'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapsipirkimasRequest  $request
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapsipirkimasRequest $request, Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        //
        $apsipirkimas->vendor_id = $request->vendor_id;
        $apsipirkimas->suma = $request->suma;
        $apsipirkimas->shop_time = $request->shop_time;
        $apsipirkimas->save();      
                
        return redirect()->route('apsipirkimas.show',[$apsipirkimas,$budget,$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apsipirkimas  $apsipirkimas
     * @return \Illuminate\Http\Response
     */
    public function destroy(apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        //
        if($apsipirkimas->pirkiniai->count()){
            return redirect()->route('apsipirkimas.show', ['apsipirkimas'=>$apsipirkimas,'budget' => $budget,'user'=>$user]);
        }
        $apsipirkimas->delete();
        return redirect()->route('budget.show',[$budget,$user])->with('success_message', 'Vartotojas :  Sekmingai ištrintas.');
   
    }
}
