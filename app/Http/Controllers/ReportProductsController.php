<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportProductsController extends Controller
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('report-products.index');
    }
}
