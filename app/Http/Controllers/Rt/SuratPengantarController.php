<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratPengantar;

class SuratPengantarController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $params['data'] = SuratPengantar::select('surat_pengantar.*')->join('users','users.id','=','surat_pengantar.user_id')->where('users.perumahan_id', \Auth::user()->perumahan_id)->get();

    	return view('rt.surat-pengantar.index')->with($params);
    }

    /**
     * [proses description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function proses($id)
    {
    	$data 			= SuratPengantar::where('id', $id)->first();
    	$data->status 	= 2;
    	$data->date_proses= date('Y-m-d H:i:s'); 
    	$data->save();

    	return redirect()->route('rt.surat-pengantar.index')->with('message-success', 'Surat Pengantar berhasil diproses');
    }

    /**
     * [print_surat_pengantar description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function print_surat_pengantar($id)
    {  
        $params['data'] = SuratPengantar::where('id', $id)->first();

        $view = view('rt.surat-pengantar.print')->with($params);

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream();
    }
}
