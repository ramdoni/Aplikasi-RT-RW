<?php

namespace App\Http\Controllers\AdminOperator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Kodami\Models\Mysql\Pulsa;

class IndexController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = [];
        $data['pulsa'] = Pulsa::all();

    	return view('kasir.index')->with($data);
    }
}
