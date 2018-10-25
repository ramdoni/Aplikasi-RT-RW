<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PengeluaranType; 

class PengeluaranTypeController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$data = PengeluaranType::where('user_id', \Auth::user()->id)->orderBy('id', 'DESC')->get();

    	return view('rt.pengeluaran-type.index', compact('data'));
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('rt.pengeluaran-type.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data['data'] 	= PengeluaranType::where('id', $id)->first();;
        
        return view('rt.pengeluaran-type.edit')->with($data);
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
        $data                       = PengeluaranType::where('id', $id)->first();
        $data->name                 = $request->name;    
        $data->save();

        return redirect()->route('rt.pengeluaran-type.index')->with('message-success', 'Data berhasil disimpan'); 
    }


    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    { 
        $data = PengeluaranType::where('id', $id)->first();
        $data->delete();

        return redirect()->route('rt.pengeluaran-type.index')->with('message-success', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {   
        $data                       = new PengeluaranType();
        $data->name                 = $request->name;
        $data->user_id              = \Auth::user()->id;
        $data->save();

        return redirect()->route('rt.pengeluaran-type.index')->with('message-success', 'Data berhasil disimpan'); 
   }
}
