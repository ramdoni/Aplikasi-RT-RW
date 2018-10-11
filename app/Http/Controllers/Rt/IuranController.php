<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\IuranWarga;

class IuranController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$params['data'] 	= Users::orderBy('id','DESC')->get();	
    	$params['tahun']	= 2018;

    	return view('rt.iuran.index')->with($params);
    }

    /**
     * [bayar description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function bayar(Request $request)
    {
        $iuran                  = new IuranWarga();
        $iuran->user_id         = $request->user_id;
        $iuran->tahun           = $request->tahun;
        $iuran->bulan           = $request->bulan;
        $iuran->nominal         = $request->nominal;
        $iuran->status          = 2;
        $iuran->rt_id           = \Auth::user()->id;

        if(!empty($request->tanggal_hari_ini))
            $iuran->date_proses     = $request->tanggal_hari_ini;
        else
            $iuran->date_proses     = $request->date_proses;

        $iuran->save();

        return redirect()->route('rt.iuran.index')->with('message-success', 'Pembayaran Iuran Berhasil dilakukan !');
    }

    /**
     * [BayarRollback description]
     * @param [type] $id [description]
     */
    public function BayarRollback($id)
    {
        $iuran          = IuranWarga::where('id', $id)->first();
        $iuran->delete(); 

        return redirect()->route('rt.iuran.index')->with('message-success', 'Pembayaran Iuran Berhasil diproses !');
    }
}
