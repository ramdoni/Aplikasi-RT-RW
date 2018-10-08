<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * [index description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function index()
    {
        return view('products.index');
    }
}