<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Iuran;

class IuranController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$params['data'] = Iuran::orderBy('id','DESC')->get();

    	return view('admin.iuran.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
    	return view('admin.iuran.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
    	$params['data'] = Iuran::where('id', $id)->first();

    	return view('admin.iuran.edit')->with($params);
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $data           = Iuran::where('id', $id)->first();
        $data->name     = $request->name;
        $data->nominal  = $request->nominal;
        $data->save();

        return redirect()->route('admin.iuran.index')->with('message-success', 'Data Iuran berhasil di simpan !');
    }


    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
    	$data 			= new Iuran();
    	$data->name 	= $request->name;
    	$data->nominal 	= $request->nominal;
    	$data->save();

    	return redirect()->route('admin.iuran.index')->with('message-success', 'Data Iuran berhasil di simpan !');
    }

    /**
     * [destroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	$data = Iuran::where('id', $id)->first();
    	$data->delete();

    	return redirect()->route('admin.iuran.index')->with('message-success', 'Data Iuran berhasil di hapus !');
    }
}
