<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratPengantarDomisili;

class SuratPengantarDomisiliController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $params['data'] = SuratPengantarDomisili::all();

    	return view('warga.surat-pengantar-domisili.index')->with($params);
    }
}