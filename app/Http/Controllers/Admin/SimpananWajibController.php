<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;

class SimpananWajibController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$params['data'] = \Kodami\Models\Mysql\Deposit::where('type', 5)->get();

    	return view('admin.simpanan-wajib.index')->with($params);
    }
}
