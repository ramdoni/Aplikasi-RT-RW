<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
   		return view('productcategory.index');		
	}
}
