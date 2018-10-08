<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use Kodami\Models\Mysql\RekeningBank; 
use Kodami\Models\Mysql\Bank;

class RekeningBankController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {        
        $data = RekeningBank::all();

    	return view('admin.rekening-bank.index', compact('data'));
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        $bank = Bank::all();

        return view('admin.rekening-bank.create', compact('bank'));
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        $data = new RekeningBank();
        $data->no_rekening      = $request->no_rekening;
        $data->bank_id          = $request->bank_id;
        $data->cabang           = $request->cabang;
        $data->owner           = $request->owner;
        $data->save();

        return redirect()->route('admin.rekening-bank.index')->with('message-success', 'Data Rekening berhasil di tambah');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function mutasi($id)
    {
        $params['data'] = \Kodami\Models\Mysql\Mutation::where('rekening_bank_id', $id)->get();

        return view('admin.rekening-bank.mutasi')->with($params);
    }
}