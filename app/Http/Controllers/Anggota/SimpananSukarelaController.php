<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimpananSukarelaController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {   
        $params['data'] = \Kodami\Models\Mysql\Deposit::where('user_id', \Auth::user()->id)->where('type', 3)->get();

    	return view('anggota.simpanan-sukarela.index')->with($params);
    }

     /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('anggota.simpanan-sukarela.create');
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
        $data = new \Kodami\Models\Mysql\Deposit();
        
        if ($request->hasFile('file_confirmation')) {
            
            $image = $request->file('file_confirmation');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/file_confirmation/'. Auth::user()->id);
            
            $image->move($destinationPath, $name);
            
            $data->file_confirmation = $name;
            $data->status = 2;
        }

        $data->no_invoice           = no_invoice(); 
        $data->nominal              = $request->nominal;
        $data->type                 = 4; // 4 = Simpanan Sukarela
        $data->user_id              = \Auth::user()->id;
        $data->save();

        return redirect()->route('anggota.simpanan-sukarela.index')->with('messages-success', 'Simpana Sukarela berhasil submit');
   }
}