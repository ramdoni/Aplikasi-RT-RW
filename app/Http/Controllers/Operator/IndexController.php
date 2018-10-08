<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Kodami\Models\Mysql\PulsaTransaksi;

class IndexController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = [];
        $data['history'] = PulsaTransaksi::all();

    	return view('operator.index')->with($data);
    }

    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
        return view('operator.profile');
    }
}
