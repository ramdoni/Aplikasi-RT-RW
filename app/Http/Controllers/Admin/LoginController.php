<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/index';
    protected $username = 'username';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        //if(Auth::attempt($credentials)){
        //    return "is login";
        //}
        return view('/admin/login');
    }
}
