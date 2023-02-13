<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use App\Models\Pakvietimas;
use App\Models\Ghost;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user   =   User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $role   =   Role::find(3);
        $user->assignRole($role);
        $ghostsAll      = Ghost::all();
        foreach($ghostsAll as $ghost){
            if($user->email == $ghost->email){
                $pakvietimai_vaiduokliai = Pakvietimas::all()->where('model_type_with',get_class($ghost));
                $pakvietimai_this = $pakvietimai_vaiduokliai->where('model_id_with',$ghost->id);
                foreach($pakvietimai_this as $pakvietimas){
                    $pakvietimas->model_type_with = get_class($user);
                    $pakvietimas->model_id_with = $user->id;
                    $pakvietimas->save();
                }
                $ghost->delete();
            }
        }
        return $user;
    }
}
