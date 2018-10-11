<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {;

    	return view('rt.index');
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
                return redirect()->route('warga.dashboard')->with('message-error', 'Access Denied');
            }
        }
    }
}
