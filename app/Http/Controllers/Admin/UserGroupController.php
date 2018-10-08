<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use Kodami\Models\Mysql\UserGroup;
use Auth;

class UserGroupController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = UserGroup::all();

    	return view('admin.user-group.index', compact('data'));
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
        return view('admin.user-group.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data = UserGroup::where('id', $id)->get();

        return view('admin.user-group.edit', compact('data'));
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
        $data =  UserGroup::where('id', $id)->first();
        $data->name         = $request->name;
        $data->description  = $request->description;
        $data->save();

        return redirect()->route('admin.user-group.index')->with('message-success', 'Data berhasil disimpan'); 
    }
    
    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = UserGroup::where('id', $id)->first();
        $data->delete();

        return redirect()->route('user-group.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $data = new UserGroup();
        $data->name  = $request->name;
        $data->description  = $request->description;
        $data->save();

        return redirect()->route('user-group.index')->with('messages-success', 'Group berhasil disimpan');
   }
}
