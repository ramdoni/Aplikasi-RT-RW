<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use Auth;
use Kodami\Models\Mysql\RekeningBankUser;
use Kodami\Models\Mysql\Bank;

class RekeningBankUserController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = RekeningBankUser::where('user_id', Auth::user()->id)->get();

    	return view('anggota.rekening-bank-user.index', compact('data'));
    }

     /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        $bank = Bank::all();

        return view('anggota.rekening-bank-user.create', compact('bank'));
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $bank = Bank::all();

        $data = RekeningBankUser::where('id', $id)->first();

        return view('anggota.rekening-bank-user.edit', compact('data', 'bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =  RekeningBankUser::where('id', $id)->first();
        $data->nama_akun            = $request->nama_akun;
        $data->no_rekening          = $request->no_rekening;
        $data->bank_id              = $request->bank_id;
        $data->cabang               = $request->cabang;
        $data->save();

        return redirect()->route('rekening-bank-user.index')->with('message-success', 'Data berhasil disimpan'); 
    }
    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = RekeningBankUser::where('id', $id)->first();
        $data->delete();

        return redirect()->route('rekening-bank-user.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $data = new RekeningBankUser();
        $data->nama_akun            = $request->nama_akun;
        $data->no_rekening          = $request->no_rekening;
        $data->bank_id              = $request->bank_id;
        $data->cabang               = $request->cabang;
        $data->user_id             = Auth::user()->id;
        $data->save();

        return redirect()->route('rekening-bank-user.index')->with('messages-success', 'Data berhasil disimpan');
   }
}