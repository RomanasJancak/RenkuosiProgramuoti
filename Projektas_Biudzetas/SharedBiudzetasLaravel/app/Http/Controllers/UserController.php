<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    //
    // PRITAIKYTI USERIUI NUKOPIJUOTA IS BUDGET Controllerio
    //


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('user.index', ['users' => $users]);
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
     * @param  \App\Http\Requests\StoreBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetRequest  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function addBudget(UpdateUserRequest $request,User $user, Budget $budget)
    {
        $user->budgets()->attach($budget);
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->save();
        return redirect()->route('user.show',['user' => $user])->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //User::factory()->count(15)->create();
        //return redirect()->route('user.index')->with('success_message', 'Vartotojas :  Sekmingai ištrintas.');    
        //
        if($user->budgets->count()){
            return redirect()->route('user.index')->with('info_message', 'Trinti negalima, nes turi Biudžetų.');
        }
        $user_name = $user->name;
        $user->delete();
        return redirect()->route('user.index')->with('success_message', 'Vartotojas : '.$user_name.' Sekmingai ištrintas.');
    }
}
