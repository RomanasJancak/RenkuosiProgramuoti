<?php

namespace App\Http\Controllers;

use App\Models\Pakvietimas;
use App\Models\User;
use App\Models\Ghost;
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
        $model_type_what    =   $request->model_type_what;
        $model_id_what      =   $request->model_id_what;
        $model_type_who     =   $request->model_type_who;
        $model_id_who       =   $request->model_id_who;
        $role_id            =   $request->role_id;
        $email              =   $request->email;
        $user               =   User::all()->where('email',$email)->first();
        if(isset($user)){
            $pakvietimas = new Pakvietimas();
            $pakvietimas->model_type_what   =   $model_type_what;
            $pakvietimas->model_id_what     =   $model_id_what;
            $pakvietimas->model_type_who    =   $model_type_who;
            $pakvietimas->model_id_who      =   $model_id_who;
            $pakvietimas->role_id           =   $role_id;
            $pakvietimas->model_type_with   =   get_class($user);
            $pakvietimas->model_id_with     =   $user->id;
            $pakvietimas->save();
        }else{
            $ghost = new Ghost();
            $ghost->email = $email;
            $ghost->save();
            $pakvietimas = new Pakvietimas();
            $pakvietimas->model_type_what   =   $model_type_what;
            $pakvietimas->model_id_what     =   $model_id_what;
            $pakvietimas->model_type_who    =   $model_type_who;
            $pakvietimas->model_id_who      =   $model_id_who;
            $pakvietimas->role_id           =   $role_id;
            $pakvietimas->model_type_with   =   get_class($ghost);
            $pakvietimas->model_id_with     =   $ghost->id;
            $pakvietimas->save();   
        }
        return back();
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
        $pakvietimas->delete();

        return redirect()->route('pakvietimas.index',$id)->withSuccess(__('Invitation to share request canceled'));
    }
}
