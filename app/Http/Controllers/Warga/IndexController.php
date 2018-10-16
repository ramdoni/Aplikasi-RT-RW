<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\Controller;
use App\ModelUser;
use Carbon\Carbon;

use Kodami\Models\Mysql\Deposit;
use Auth;

class IndexController extends ControllerLogin
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = [];
        $data['user']       = \App\UserModel::where('id', Auth::user()->id)->first();

    	return view('warga.index')->with($data);
    }

    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
        return view('anggota.profile');
    }

    /**
     * [saveProfile description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateProfile(Request $request)
    {
        $data = ModelUser::where('id', Auth::user()->id)->first();
        $data->name                 = strtoupper($request->name);
        $data->jenis_kelamin        = $request->jenis_kelamin;
        $data->telepon              = $request->telepon;
        $data->agama                = $request->agama;
        $data->save();
   
        return redirect()->route('warga.dashboard')->with('message-success', 'Profil berhasil disimpan');
    }

    /**
     * [backtoadmin description]
     * @return [type] [description]
     */
    public function backtoadmin()
    {
        if(\Session::get('is_login_admin'))
        {
            $find = \App\User::where('access_id', 1)->first();
            
            if($find)
            {
                \Auth::loginUsingId($find->id);

                return redirect()->route('admin.dashboard')->with('message-success', 'Welcome Back Admin');
            }
            else
            {
                return redirect()->route('warga.dashboard')->with('message-error', 'Access Denied');
            }
        }
    }
}
