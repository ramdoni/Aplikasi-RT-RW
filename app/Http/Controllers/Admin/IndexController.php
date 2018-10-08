<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\ModelUser;

class IndexController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$total_anggota 			= ModelUser::where('access_id', 2)->get()->count();
    	$total_simpanan_pokok 	= 0;
    	$total_simpanan_sukarela=0;
    	$total_simpanan_wajib 	=0;

    	return view('admin.index', compact('total_anggota','total_simpanan_pokok','total_simpanan_sukarela', 'total_simpanan_wajib'));
    }

    /**
     * [setting description]
     * @return [type] [description]
     */
    public function setting()
    {
        return view('admin.setting');
    }
}
