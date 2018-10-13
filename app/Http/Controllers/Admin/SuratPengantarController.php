<?php

namespace App\Http\Controllers\Admin;

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
        $params['data'] = SuratPengantar::all();

    	return view('admin.surat-pengantar.index')->with($params);
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

    	return redirect()->route('admin.surat-pengantar.index')->with('message-success', 'Surat Pengantar berhasil diproses');
    }
}
