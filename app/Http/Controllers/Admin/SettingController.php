<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;

class SettingController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$params['data'] = \App\Setting::all();

    	return view('admin.setting.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $user = \App\Setting::where('id', $id)->first();
        $data['data'] 	= $user;
        $data['id'] 	= $id;
        
        return view('admin.setting.edit')->with($data);
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
        $data =  \App\Setting::where('id', $id)->first();
        
        $data->field            = $request->field; 
        $data->value            = $request->value; 
        $data->save();

        return redirect()->route('admin.setting.index')->with('message-success', 'Data berhasil disimpan'); 
    }


    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = \App\Setting::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.setting.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data               =  new \App\Setting();
        $data->field        = $request->field;
        $data->value        = $request->value;
        $data->save();

        return redirect()->route('admin.setting.index')->with('message-success', 'Data berhasil disimpan'); 
   }
}
