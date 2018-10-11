<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Models\UserAccess;

class UserAccessController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = UserAccess::all();

    	return view('admin.user-access.index', compact('data'));
    }

    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
    	return view('admin.profile');
    }
    
    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.user-access.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $params['data'] = UserAccess::where('id', $id)->first();

        return view('admin.user-access.edit')->with($params);
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
        $data               =  UserAccess::where('id', $id)->first();
        $data->name         = $request->name;
        $data->description  = $request->description;
        $data->save();

        return redirect()->route('admin.user-access.index')->with('message-success', 'Data berhasil disimpan'); 
    }
    
    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = UserAccess::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.user-access.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $data               = new UserAccess();
        $data->name         = $request->name;
        $data->description  = $request->description;
        $data->save();

        return redirect()->route('admin.user-access.index')->with('messages-success', 'User Access berhasil disimpan');
   }
}
