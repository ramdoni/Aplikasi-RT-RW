<?php

namespace App\Http\Controllers\Bendahara;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\Controller;
use App\ModelUser;
use Carbon\Carbon;

use Kodami\Models\Mysql\Deposit;
use Auth;

class IndexController extends ControllerLogin
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {;

    	return view('bendahara.index');
    }

    /**
     * [backtoadmin description]
     * @return [type] [description]
     */
    public function backtoadmin()
    {
        if(\Session::get('is_login_admin'))
        {
            $find = \App\Models\Users::where('access_id', 1)->first();
            
            if($find)
            {
                \Auth::loginUsingId($find->id);

                return redirect()->route('admin.dashboard')->with('message-success', 'Welcome Back Admin');
            }
            else
            {
                return redirect()->route('bendahara.dashboard')->with('message-error', 'Access Denied');
            }
        }
    }
}
