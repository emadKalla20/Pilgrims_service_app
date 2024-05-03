<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
            'user_id_num' => ['required', 'numeric', 'digits:10'],
            'phone_num' => ['required', 'numeric','digits:9'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_id_num' => $data['user_id_num'],
            'phone_num' => $data['phone_num'],
            'role_id' => $data['role']
        ]);
    }

    protected function showAdminRegistrationForm(){
        return view('auth\create_admin');
    }

    /**
     * Create a admin user.
     *
     */

    protected function createAdmin(array $data){

        $role = new Role;
        if(!$role->isThereAdminRole()){

            $role->name = 'admin';
            $role->administration_level = 3;
            $role->save();
            $role_id = $role->id;
        }else{
            $role_id = Role::where('name','like',"%admin%")->first()->id;
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_id_num' => $data['user_id_num'],
            'phone_num' => $data['phone_num'],
            'role_id' => $role_id
        ]);

    }
}
