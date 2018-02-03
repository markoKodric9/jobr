<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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


    public function showRegistrationForm(){
      return view('auth.register-user');
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    protected $redirectTo = '/send-verify';

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'nullable|string|min:9|',
            'about' => 'required|string',
            'birthday' => 'nullable|string|min:10',
            'cv' => 'required',
            'pic' => 'nullable'
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
      $cvName = '';
      if (Input::file('cv')->isValid()) {
           $destinationPath = public_path('uploads/cvs');
           $extension = Input::file('cv')->getClientOriginalExtension();
           $cvName = uniqid().'.'.$extension;

           Input::file('cv')->move($destinationPath, $cvName);
       }

       $picName = '';
       if (Input::file('pic') != null  && Input::file('pic')->isValid()) {
            $destinationPath = public_path('uploads/pics');
            $extension = Input::file('pic')->getClientOriginalExtension();
            $picName = uniqid().'.'.$extension;

            Input::file('pic')->move($destinationPath, $picName);
        }


        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'about' =>$data['about'],
            'pic' => $picName,
            'cv' => $cvName
        ]);
    }

    public function showUserTypeSelection(){
      return view('userTypeSelection')->with('action', 'register');
    }
}
