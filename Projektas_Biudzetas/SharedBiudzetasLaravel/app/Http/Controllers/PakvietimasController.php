<?php

namespace App\Http\Controllers;

use App\Models\Pakvietimas;
use App\Http\Requests\StorePakvietimasRequest;
use App\Http\Requests\UpdatePakvietimasRequest;

class PakvietimasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $pakvietimaiAll = Pakvietimas::all();
        $pakvietimai = collect();
        foreach($pakvietimaiAll as $pakvietimas){
            if(get_class(auth()->user()) === $pakvietimas->model_type_with){
                if(auth()->user()->id === $pakvietimas->model_id_with){
                    $pakvietimai->push($pakvietimas);
                }
            }            
            
        }
        
        return view('pakvietimas.index', ['pakvietimai' => $pakvietimai,'user' => $user]);
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
     * @param  \App\Http\Requests\StorePakvietimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePakvietimasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pakvietimas  $pakvietimas
     * @return \Illuminate\Http\Response
     */
    public function show(Pakvietimas $pakvietimas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pakvietimas  $pakvietimas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pakvietimas $pakvietimas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePakvietimasRequest  $request
     * @param  \App\Models\Pakvietimas  $pakvietimas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePakvietimasRequest $request, Pakvietimas $pakvietimas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pakvietimas  $pakvietimas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pakvietimas $pakvietimas)
    {

        $id =   $pakvietimas->model_id_with;
        //$pakvietimas->delete();

        return redirect()->route('pakvietimas.index',$id)->withSuccess(__('Friendship request canceled'));
    }
}
