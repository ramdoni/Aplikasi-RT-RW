<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\ModelUser; 

class MootaBankController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $params['data'] = \Kodami\Models\Mysql\Bank::whereNotNull('moota_bank_id')->orderBy('id', 'DESC')->get();

    	return view('admin.moota-bank.index')->with($params);
    }

    /**
     * [mutasi description]
     * @return [type] [description]
     */
    public function mutasi($bank_id)
    {
        $params['data']     = \Kodami\Models\Mysql\MutasiMoota::where('bank_id', $bank_id)->orderBy('id', 'DESC')->get();
        $params['bank']     = \Kodami\Models\Mysql\Bank::where('id', $bank_id)->first();

        return view('admin.moota-bank.mutasi')->with($params);
    }
}
