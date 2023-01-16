<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Apsipirkimas;
use App\Models\User;
use App\Models\pirkinys;
use App\Models\Prekepaslauga;
use App\Http\Requests\StorepirkinysRequest;
use App\Http\Requests\UpdatepirkinysRequest;
use App\Http\Requests\UpdateapsipirkimasRequest;


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
        //dd(Apsipirkimas::find($apsipirkimas));
        $pirkinys   =   new Pirkinys;
        //$pirkinys->console_log(Apsipirkimas::find($apsipirkimas));
        //$apsipirkimas=Apsipirkimas::find($apsipirkimas);
        $pirkinys->price    =   $request->price;
        $pirkinys->quantity =   $request->quantity;
        $pirkinys->deposit  =   $request->deposit;
        $pirkinys->sum      =   $pirkinys->quantity*($pirkinys->price+$pirkinys->deposit);
        $pirkinys->prekepaslauga_id =   $request->prekePaslauga;
        $pirkinys->apsipirkimas_id = $apsipirkimas;
        //$pirkinys->save();
        //$pirkinys->console_log($pirkinys->apsipirkimas);
        //$pirkinys->console_log($pirkinys->sum);
        // $pirkinys->console_log($pirkinys->apsipirkimas->suma);        
        $pirkinys->apsipirkimas->suma += $pirkinys->sum;
        // $pirkinys->console_log($pirkinys->apsipirkimas->suma);
        $pirkinys->apsipirkimas->update();
        $pirkinys->save();
        //$pirkinys->console_log($pirkinys->apsipirkimas);
        // $pirkinys->console_log(Apsipirkimas::find($apsipirkimas));
        //dd($pirkinys->apsipirkimas);
        return redirect()->route('apsipirkimas.show',[$apsipirkimas,$budget,$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function show(pirkinys $pirkinys,Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        return view('pirkinys.show', ['pirkinys'=>$pirkinys,'apsipirkimas'=>$apsipirkimas,'budget' => $budget,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function edit(pirkinys $pirkinys,Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        return view('pirkinys.edit', ['pirkinys'=>$pirkinys,'apsipirkimas'=> $apsipirkimas,'budget' => $budget,'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepirkinysRequest  $request
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepirkinysRequest $request, pirkinys $pirkinys,Apsipirkimas $apsipirkimas,Budget $budget,User $user)
    {
        $pirkinys->price    =   $request->price;
        $pirkinys->quantity =   $request->quantity;
        $pirkinys->deposit  =   $request->deposit;
        $pirkinys->apsipirkimas->suma -= $pirkinys->sum;
        $pirkinys->sum      =   $pirkinys->quantity*($pirkinys->price+$pirkinys->deposit);
        $pirkinys->prekepaslauga_id =   $request->prekePaslauga;
        $pirkinys->apsipirkimas_id = $apsipirkimas->id;
        //
        $pirkinys->apsipirkimas->suma += $pirkinys->sum;
        $pirkinys->apsipirkimas->update();
        //        
        $pirkinys->save();
        $pirkinys->apsipirkimas()->associate($apsipirkimas);
        return redirect()->route('pirkinys.show',[$pirkinys,$apsipirkimas,$budget,$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pirkinys  $pirkinys
     * @return \Illuminate\Http\Response
     */
    public function destroy(pirkinys $pirkinys,$user)
    {
        $apsipirkimas   =   $pirkinys->apsipirkimas;
        $budget         =   $pirkinys->apsipirkimas->budget;
        $pirkinys->apsipirkimas->suma -= $pirkinys->sum;
        $pirkinys->apsipirkimas->update();      
        $pirkinys->delete();
        return redirect()->route('apsipirkimas.show', ['apsipirkimas'=>$apsipirkimas,'budget' => $budget,'user'=>$user]);
    }
}
