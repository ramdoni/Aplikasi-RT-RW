<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * [credentials description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    protected function credentials(Request $request)
    {
        if($request->get('email')){
            return ['email'=>$request->get('email'),'password'=> $request->get('password')];
        }

        return $request->only($this->username(), 'password');
    }
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        // if user have role
        if (auth()->user()->access_id == 1)
        {
            return $this->redirectTo = '/admin';
        }
        elseif(auth()->user()->access_id == 2)
        {
            return $this->redirectTo = '/warga';            
        }
        elseif(auth()->user()->access_id == 3)
        {
            return $this->redirectTo = '/bendahara';
        }
        elseif(auth()->user()->access_id == 4)
        {
            return $this->redirectTo = '/rt';
        }
        elseif(auth()->user()->access_id == 5)
        {
            return $this->redirecTo = 'rw';
        }
        
        return $this->redirectTo = '/home';
    }
}
