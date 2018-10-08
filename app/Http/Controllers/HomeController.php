<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kodami\Models\Mysql\ContactUs;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * [postContactUs description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postContactUs(Request $request)
    {
        $data           = new ContactUs();
        $data->nama     = $request->nama;
        $data->email    = $request->email;
        $data->telepon  = $request->telepon;
        $data->message  = $request->message;
        $data->save();

        return redirect('/')->with('messages', 'Pertanyaan dan Kritik anda akan kami proses dengan segera.');
    }
}
