<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;

class SimpananPokokController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$params['data'] = \Kodami\Models\Mysql\Deposit::where('type', 3)->get();

    	return view('admin.simpanan-pokok.index')->with($params);
    }
}
