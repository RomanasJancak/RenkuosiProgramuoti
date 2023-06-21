<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use thiagoalessio\TesseractOCR\TesseractOCR;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function __construct()
    { 
        $this->middleware('permission:user-view',   ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit',   ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }



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



        //jeigu bent viena role neturi tėvines klasės tai tai yra superadmin ir gali matyti visus userius
        foreach(auth()->user()->roles as $role){
            if($role->parent_id == null){
                return view('user.index', ['users' => User::all()]);
            }
        }
        //kitu atveju bus einama per visu vartotojos ir ziurima ar bent viena role iš esamo vartotojo yra aukščiau už
        // norima atvaizduoti $user role.
        $usersAll = User::all();
        $users = collect();
        $users->push(auth()->user());
        foreach($usersAll as $userAll){
            if((auth()->user()->isRoleBelow($userAll))){
                $users->push($userAll);
            }
        }        
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolesAll   =   Role::all();
        $roles      =   collect();
        foreach(auth()->user()->roles as $role){
            foreach($rolesAll as $roleAll){
                if($role->isRoleBelow($roleAll)){
                    $roles->push($roleAll);
                }
            }
        }
        return view('user.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBudgetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user           =   new User;
        $user->name     =   $request->name;
        $user->email    =   $request->email;
        $user->password =   Hash::make($request->password);
        $user->save();

        $user->assignRole($request->role);
        return redirect()->route('user.index')->withSuccess(__('User Created Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //*
        if((auth()->user()->id==$user->id)||(auth()->user()->isRoleBelow($user))){
            return view('user.show', ['user' => $user]);
        }else{
            $user = auth()->user();
            return redirect()->route('user.show', ['user' => $user])->withError(__('Cannot access that user.'));
        }
        //*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budget  $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if((auth()->user()->id==$user->id)||(auth()->user()->isRoleBelow($user))){
            return view('user.edit', ['user' => $user]);
        }else{
            $user = auth()->user();
            return redirect()->route('user.show', ['user' => $user])->withError(__('Cannot access that user.'));
        }
        //return view('user.edit', ['user' => $user]);
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
    public function notif(){

    }
}
