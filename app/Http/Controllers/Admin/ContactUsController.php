<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\Controller;
use Kodami\Models\Mysql\ContactUs;


class ContactUsController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$data = ContactUs::all();

    	return view('admin.contactus.index', compact('data'));
    }
}
