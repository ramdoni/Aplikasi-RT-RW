<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\ModelUser;
use Kodami\Models\Mysql\RekeningBank;
use Kodami\Models\Mysql\Bank;
use Kodami\Models\Mysql\RekeningBankUser;
use Kodami\Models\Mysql\Deposit;
use Auth;

class BayarController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function step1(Request $request)
    {
        $data = [];
        $data['rekening_bank']          = RekeningBank::all();
        $data['rekening_bank_user']     = RekeningBankUser::where('user_id', Auth::user()->id)->get();
        $data['bank']                   = Bank::all(); 
        $code = rand(100, 999); 
        $data['code'] = $code;
        $total_pembayaran = get_setting('simpanan_pokok') + (Auth::user()->durasi_pembayaran * get_setting('simpanan_wajib') + get_setting('kartu_anggota') + Auth::user()->first_simpanan_sukarela )+$code;

        $data['total_pembayaran']       = $total_pembayaran; 
        $data['invoice_date']           = date('d F Y');
        $data['due_date']               = date('Y-m-d', strtotime("+3 days"));
        $data['no_invoice']             = no_invoice();

    	return view('anggota.bayar.bayar')->with($data);
    }

    /**
     * [submitStep1 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function submitStep1(Request $request)
    {
        $user = \App\UserModel::where('id', Auth::user()->id)->first();
        $user->durasi_pembayaran            = $request->durasi_pembayaran;
        $user->first_durasi_pembayaran_date       = date('Y-m-d');
        $user->first_simpanan_sukarela      = $request->first_simpanan_sukarela;
        $user->save();

        return redirect()->route('anggota.bayar');
    }


    /**
     * [submit description]
     * @param  Request $reques [description]
     * @return [type]          [description]
     */
    public function submit(Request $request)
    {   
        $data = new Deposit;
        $data->no_invoice   = $request->no_invoice;
        $data->user_id      = Auth::user()->id;
        $data->status       = 1; // menunggu konfirmasi pembayaran
        $data->type         = 1; // pembayaran awal sebagai anggota
        $data->nominal      = $request->total_pembayaran;
        $data->rekening_bank_id         = $request->rekening_bank_id;
        $data->rekening_bank_user_id    = $request->rekening_bank_user_id;
        $data->due_date                 = $request->due_date;
        $data->code         = $request->code;
        $data->save();
        
        return redirect()->route('anggota.dashboard')->with('message-success', 'Pembayaran anda berhasil dilakukan, silahkan melakukan pembayaran');
    }

    /**
     * [confirmation description]
     * @return [type] [description]
     */
    public function confirmation(Request $request)
    {   
        $data = Deposit::where('id', $request->id)->first();

        if ($request->hasFile('file')) {
            
            $image = $request->file('file');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/file_confirmation/'. Auth::user()->id);
            
            $image->move($destinationPath, $name);
            
            $data->file_confirmation = $name;
            $data->status = 2;
        }
        $data->save();

        return redirect()->route('anggota.dashboard')->with('message-success', "File Konfirmasi berhasil di upload silahkan anda konfirmasi dari Admin");
    }

    /**
     * [addRekeningBank description]
     * @param Request $request [description]
     */
    public function addRekeningBank(Request $request)
    {
        $bank = new \Kodami\Models\Mysql\RekeningBankUser;
        $bank->nama_akun        = $request->nama_akun;
        $bank->no_rekening      = $request->no_rekening;
        $bank->bank_id          = $request->bank_id;
        $bank->cabang           = $request->cabang;
        $bank->user_id          = $request->user_id;
        $bank->save();

        return redirect()->route('anggota.bayar', ['#tab-rekening'])->with('message-success', 'Data Bank berhasil ditambahkan');
    }
}