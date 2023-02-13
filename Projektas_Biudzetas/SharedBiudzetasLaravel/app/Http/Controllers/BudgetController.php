<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\User;
use App\Models\Pakvietimas;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{
    public function __construct()
    { 
        $this->middleware('permission:budget-view-owner',   ['only' => ['index']]);
        $this->middleware('permission:budget-view-editor',  ['only' => ['index']]);
        $this->middleware('permission:budget-view-viewer',  ['only' => ['index']]);
        $this->middleware('permission:budget-create-owner', ['only' => ['create','store']]);
        $this->middleware('permission:budget-create-editor',['only' => ['create','store']]);
        $this->middleware('permission:budget-create-viewer',['only' => ['create','store']]);
        $this->middleware('permission:budget-edit-owner',   ['only' => ['edit','update']]);
        $this->middleware('permission:budget-edit-editor',  ['only' => ['edit','update']]);
        $this->middleware('permission:budget-edit-viewer',  ['only' => ['edit','update']]);
        $this->middleware('permission:budget-delete-owner', ['only' => ['destroy']]);
        $this->middleware('permission:budget-delete-editor',['only' => ['destroy']]);
        $this->middleware('permission:budget-delete-viewer',['only' => ['destroy']]);
    }
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
        //dd($user->pivot->role_id);
        $budget = new Budget;
        //dd($budget);
        $budget->name = $request->budget_name;
        //$budget->users()->save($request->user);
        //$budget->users()->sync([$request->user_id]);
        $budget->save();
        //dd($request->user_id);        
        $budget->users()->attach($user,['role_id' => 4]);
                
        return redirect()->route('user.show',$user)->withSuccess(__('Budget created successfully.'));
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
        if(isset($request->make_owner)){
            //dd($request->make_owner);
            $useris =   User::find($request->make_owner);
            $budget->users()->detach($useris);
            $budget->users()->attach($useris,['role_id' => 4]);
            $budget->users()->detach($user);
            $budget->users()->attach($user,['role_id' => 5]);
            return redirect()->route('budget.show', ['budget'=>$budget,'user' => $user]);
        }
        if(isset($request->change_user_role)){
            $useris =   User::find($request->change_user);
            $budget->users()->detach($useris);
            $budget->users()->attach($useris,['role_id' => $request->change_user_role]);
            return redirect()->route('budget.show', ['budget'=>$budget,'user' => $user]);
        }

        //dd(Pakvietimas::all());
        if(isset($request->budget_name)){
        $budget->name = $request->budget_name;
        }
        if(isset($request->remove_user)){
            $useris =   User::find($request->remove_user);
            $budget->users()->detach($useris);
            if($request->remove_user == $user->id){
                return view('user.show', ['user' => $user]);
            }else{
                return redirect()->route('budget.show', ['budget'=>$budget,'user' => $user]);    
            }
            
        }
        if($budget->users->contains($user)){
            $budget->save();
        }else{
            $budget->save();
            $budget->users()->attach($user,['role_id' => $request->role_id]);
        }
        if(isset($request->pakvietimas_id)){
            //dd(Pakvietimas::find($request->pakvietimas_id));
            Pakvietimas::find($request->pakvietimas_id)->delete();
        }
        //dd($request->user_id);        
                
        //return view('budget.show', ['budget'=>$budget,'user' => $user]);
        return redirect()->route('budget.show', ['budget'=>$budget,'user' => $user]);
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
        if($budget->apsipirkimai->count()){
            return redirect()->route('budget.show',[$budget,$user])->with('info_message', 'Trinti negalima, nes turi Apsipirkimų.');
        }
        $budget_name = $budget->name;
        $budget->users()->detach();
        $budget->delete();
        return redirect()->route('user.show',$user)->with('success_message', 'Vartotojas : '.$budget_name.' Sekmingai ištrintas.');
    }
}
