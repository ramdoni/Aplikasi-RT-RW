<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use Kodami\Models\Mysql\Deposit;
use App\ModelUser; 

class BayarAdminController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {        
    	return;
    }

    /**
     * [approve description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function approve($id)
    {  
        $status = Deposit::where('id', $id)->first();
        $status->status = 3;
        $status->save(); 

        $user = \App\UserModel::where('id', $status->user_id)->first();

        /** Rubah status angota jadi active */
        $user = ModelUser::where('id', $status->user_id)->first();
        $user->status = 2;
        $user->save();

        // Insert Simpanan Pokok
        $deposit                = new Deposit();
        $deposit->no_invoice    = $status->no_invoice; 
        $deposit->status        = 3;
        $deposit->type          = 3;
        $deposit->user_id       = $status->user_id;
        $deposit->nominal       = get_setting('simpanan_pokok');
        $deposit->save();  

        // Insert Simpanan Wajib
        $deposit                = new Deposit();
        $deposit->no_invoice    = $status->no_invoice; 
        $deposit->status        = 3; 
        $deposit->type          = 5;
        $deposit->user_id       = $status->user_id;
        $deposit->nominal       = $user->durasi_pembayaran * get_setting('simpanan_wajib');
        $deposit->save();

        // Insert Simpanan Sukarela
        $deposit                = new Deposit();
        $deposit->no_invoice    = $status->no_invoice; 
        $deposit->status        = 3; 
        $deposit->type          = 4;
        $deposit->user_id       = $status->user_id;
        $deposit->nominal       = $user->first_simpanan_sukarela;
        $deposit->save();

        return redirect()->route('anggota.index')->with('message-success', "Proses Approval berhasil");
    }

    /**
     * [denied description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function denied($id)
    {   
        $deposit = Deposit::where('id', $id)->first();
        $deposit->status = 4;
        $deposit->save();

         /** Rubah status angota jadi reject */
        $user = ModelUser::where('id', $deposit->user_id)->first();
        $user->status = 3;
        $user->save();

        return redirect()->route('anggota.index')->with('message-success', "Proses Reject berhasil");
    }
}
