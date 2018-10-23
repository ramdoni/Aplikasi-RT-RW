<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Models\KeluhanDanSaran;

class IndexController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('admin.index');
    }

    /**
     * [setting description]
     * @return [type] [description]
     */
    public function setting()
    {
        return view('admin.setting');
    }

    /**
     * [keluhan description]
     * @return [type] [description]
     */
    public function keluhan()
    {
        $params['data'] = KeluhanDanSaran::all();

        return view('admin.keluhan')->with($params);
    }
}