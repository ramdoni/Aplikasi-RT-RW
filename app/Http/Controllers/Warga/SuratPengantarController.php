<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratPengantar;

class SuratPengantarController extends Controller
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
        $params['data'] = SuratPengantar::where('user_id', \Auth::user()->id)->get();

    	return view('warga.surat-pengantar.index')->with($params);
    }

    /**
     * [requestSubmit description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function requestSubmit(Request $request)
    {
        $data               = new SuratPengantar();
        $data->user_id      = \Auth::user()->id;
        $data->surat_pengantar=$request->surat_pengantar;
        $data->status       = 1; 
        $data->save();

        return redirect()->route('warga.surat-pengantar.index')->with('message-success', 'Surat Pengantar berhasil di submit, silahkan tunggu persutujuan dari RT !');
    }
}