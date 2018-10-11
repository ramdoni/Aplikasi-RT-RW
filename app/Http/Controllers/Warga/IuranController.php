<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IuranWarga;

class IuranController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $params['tahun'] = 2018;
        
    	return view('warga.iuran.index')->with($params);
    }

    /**
     * [bayar description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function bayar(Request $request)
    {
    	$iuran                  = new IuranWarga();
        $iuran->user_id         = \Auth::user()->id;
        $iuran->tahun           = $request->tahun;
        $iuran->bulan           = $request->bulan;
        $iuran->nominal         = $request->nominal;
        $iuran->status          = 1;
        $iuran->date_proses     = date('Y-m-d H:i:s');
        $iuran->save();

    	return redirect()->route()->with('message-success', 'Pembayaran berhasil diproses, silahkan anda melakukan pembayaran !');
    }
}