<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'firstname' => 'required|max:255',
            'middlename' => 'required||max:255',
            'lastname' => 'required|max:255',
            'sex' => 'required|max:255',
            'birthday' => 'required|max:255',
            'address' => 'required||max:255',
            'mobilenumber' => 'required|min:7',
            'emailaddress' => 'required|email|max:255|unique:users',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|string|confirmed|min:8|max:255',
            'userlevel' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255',
        ]);

        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'sex' => $data['sex'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'mobilenumber' => $data['mobilenumber'],
            'username' => $data['username'],
            'userlevel' => $data['userlevel'],
            'idnumber' => $data['idnumber'],
            'emailaddress' => $data['emailaddress'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
