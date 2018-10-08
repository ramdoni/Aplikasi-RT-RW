<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;

class UserController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {        
        $params['data'] = \Kodami\Models\Mysql\Users::where('access_id', '<>', 2)->orderBy('id', 'DESC')->get();

    	return view('admin.user.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
    	return view('/admin/profile');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data = \App\UserModel::where('id', $id)->first();

        return view('admin.user.edit', compact('data'));
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
        $data =  \App\UserModel::where('id', $id)->first();
        
        if(!empty($request->password))
        {
            $this->validate($request,[
                'confirmation'      => 'same:password',
            ]);

            $data->password             = bcrypt($request->password);
        }

        $data->no_anggota           = $request->no_anggota;
        $data->nik                  = $request->nik;
        $data->telepon              = $request->telepon;
        $data->name                 = $request->name;
        $data->email                = $request->email; 
        $data->jenis_kelamin        = $request->jenis_kelamin;
        $data->access_id            = $request->access_id;
        $data->save();

        return redirect()->route('admin.user.index')->with('message-success', 'Data berhasil disimpan'); 
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nik'               => 'required|unique:users',
            'telepon'           => 'required',
            'name'              => 'required',
            //'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'confirmation'      => 'required|same:password',
        ]);

        $data = new \App\UserModel();
        $data->no_anggota           = $request->no_anggota;
        $data->nik                  = $request->nik;
        $data->telepon              = $request->telepon;
        $data->name                 = $request->name;
        $data->email                = $request->email;
        $data->jenis_kelamin        = $request->jenis_kelamin;
        $data->password             = bcrypt($request->password); 
        $data->access_id            = $request->access_id;
        $data->save();

        return redirect()->route('admin.user.index')->with('message-success', 'User berhasil di buat');
    }

    /**
     * [autologin description]
     * @param  [type] $encrypt [description]
     * @return [type]          [description]
     */
    public function autologin($id)
    {
        $user = \Kodami\Models\Mysql\Users::where('id', $id)->first();

        if($user)
        {
            \Auth::loginUsingId($id);
            \Session::put('is_login_admin', true);

            if($user->access_id == 3)
            {
                return redirect()->route('kasir.index')->with('message-success', 'Welcome '. $user->name);
            }
            if($user->access_id == 4)
            {
                return redirect()->route('cs.index')->with('message-success', 'Welcome '. $user->name);
            }
            if($user->access_id == 5)
            {
                return redirect()->route('operator.index')->with('message-success', 'Welcome ' .$user->name);
            }
            if($user->access_id == 6)
            {
                return redirect()->route('admin.index')->with('message-success', 'Welcome '. $user->name);
            }
            if($user->access_id == 7)
            {
                return redirect()->route('dropshiper.index')->with('message-success', 'Welcome '.$user->name);
            }
        }
        else
        {

        }
    }
}
