<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$params['data'] = \App\UserModel::where('access_id', 2)->orderBy('id', 'DESC')->get();

    	return view('kasir.index')->with($params);
    }

	/**
     * [backtoadmin description]
     * @return [type] [description]
     */
    public function backtoadmin()
    {
    	if(\Session::get('is_login_admin'))
    	{
	        $find = \App\User::where('access_id', 1)->first();
	        
	        if($find)
	        {
	            \Auth::loginUsingId($find->id);

	            return redirect()->route('admin.dashboard')->with('message-success', 'Welcome Back Admin');
	        }
	        else
	        {
	            return redirect()->route('anggota.dashboard')->with('message-error', 'Access Denied');
	        }
	    }
	    else
	    {
	        return redirect()->route('anggota.dashboard')->with('message-error', 'Access Denied');
	    }
    }
}