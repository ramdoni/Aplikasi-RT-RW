<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengeluaran; 

class PengeluaranController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $filter = Pengeluaran::orderBy('id', 'DESC');

        if(isset($_GET['tahun']) and $_GET['tahun'] != "")
        {
            $filter = $filter->whereYear('tanggal', $_GET['tahun']);
        }

        if(isset($_GET['bulan']) and $_GET['bulan'] != "")
        {
            $filter = $filter->whereMonth('tanggal', $_GET['bulan']);
        }

    	$params['data']                 = $filter->get();
        $params['total_pengeluaran']    = $filter->sum('nominal'); 

    	return view('admin.pengeluaran.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data['data'] 	= Pengeluaran::where('id', $id)->first();;
        
        return view('admin.pengeluaran.edit')->with($data);
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
        $data                       = Pengeluaran::where('id', $id)->first();
        $data->pengeluaran_type_id  = $request->pengeluaran_type_id;
        $data->keterangan           = $request->keterangan;    
        $data->nominal              = $request->nominal;
        $data->tanggal              = $request->tanggal;
        $data->save();

        return redirect()->route('admin.pengeluaran.edit', $data->id)->with('message-success', 'Data berhasil disimpan'); 
    }


    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    { 
        $data = Pengeluaran::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.pengeluaran.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   
        $data                       = new Pengeluaran();
        $data->user_id              = \Auth::user()->id;
        $data->pengeluaran_type_id  = $request->pengeluaran_type_id;
        $data->keterangan           = $request->keterangan;    
        $data->nominal              = $request->nominal;
        $data->tanggal              = $request->tanggal;
        $data->save();

        return redirect()->route('admin.pengeluaran.index')->with('message-success', 'Data berhasil disimpan'); 
   }
}
