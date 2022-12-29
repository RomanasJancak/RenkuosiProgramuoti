<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\User;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $budgets = Budget::all();
        return view('budget.index', ['budgets' => $budgets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        return view('budget.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetRequest $request,$user)
    {
        //
        //dd($request);
        $budget = new Budget;
        $budget->name = $request->budget_name;
        //$budget->users()->save($request->user);
        //$budget->users()->sync([$request->user_id]);
        $budget->save();
        //dd($request->user_id);        
        $budget->users()->attach($user);
                
        return redirect()->route('user.show',$user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget,User $user)
    {
        //
        return view('budget.show', ['budget'=>$budget,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget,User $user)
    {
        //
        return view('budget.edit', ['budget' => $budget,'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetRequest  $request
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetRequest $request, Budget $budget,User $user)
    {
        //
                //
        //dd($request);
        $budget->name = $request->budget_name;
        //$budget->users()->save($request->user);
        //$budget->users()->sync([$request->user_id]);
        $budget->save();
        //dd($request->user_id);        
                
        return view('budget.show', ['budget'=>$budget,'user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budget $budget,User $user)
    {
       // dd($budget);
       // if($budget->users->count()){
       //     return redirect()->route('user.show',$user)->with('info_message', 'Trinti negalima, nes turi Biudžetų.');
       // }
        $budget_name = $budget->name;
        $budget->users()->detach();
        $budget->delete();
        return redirect()->route('user.show',$user)->with('success_message', 'Vartotojas : '.$budget_name.' Sekmingai ištrintas.');
    }
}
