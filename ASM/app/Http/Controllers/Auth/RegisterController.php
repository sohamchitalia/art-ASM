<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Rules\checkRefId;

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
        if('role' == 'artist'){    
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|numeric|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'ref_id' => 'nullable',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
           
        ]);
        }
    else{
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|numeric|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'ref_id' => ['nullable' , new checkRefId()],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
           
        ]);

        }

    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $referenceid = $data['ref_id'];
        // $refids = DB::table('refs')
        //         ->select(DB::raw('ref_id, used'))
        //         ->where('used', 1)
        //         ->get()
        //         ->toArray();
        // if(in_array($referenceid, $refids))
        // {
        //     DB::table('users')
        //     ->where('ref_id' , $referenceid) 
        //     -> update(['used' => 0]);

        return User::create([
           'name' => $data['name'],
           'address' => $data['address'],
           'role' => $data['role'],
           'ref_id' => $data['ref_id'],
           'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

     // email using mail fascade

      //  \Mail::to($user)->send(new Email);

    // else{
    //     return route('register');
    // }
    }
}