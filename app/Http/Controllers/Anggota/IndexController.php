<?php

namespace App\Http\Controllers\Anggota;

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
        $data['tagihan']    = Deposit::where('user_id', Auth::user()->id)->where('status',1) ->where('due_date', '>=', date('Y-m-d'))->where('type', 1)->first();
        $data['deposit']    = Deposit::where('user_id', Auth::user()->id)->where('type', 1)->first();
        $data['user']       = \App\UserModel::where('id', Auth::user()->id)->first();

    	return view('anggota.index')->with($data);
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
    public function saveProfile(Request $request)
    {
        $data = ModelUser::where('id', Auth::user()->id)->first();
        
        if(!empty($request->agama)) $data->agama = $request->agama;
        if(!empty($request->tempat_lahir)) $data->tempat_lahir = $request->tempat_lahir;
        if(!empty($request->tanggal_lahir)) $data->tanggal_lahir = $request->tanggal_lahir;   

        $data->domisili_provinsi_id     = $request->domisili_provinsi_id;
        $data->domisili_kabupaten_id    = $request->domisili_kabupaten_id;
        $data->domisili_kecamatan_id    = $request->domisili_kecamatan_id;
        $data->domisili_kelurahan_id    = $request->domisili_kelurahan_id;
        $data->domisili_alamat          = $request->domisili_alamat;

        $data->ktp_provinsi_id          = $request->ktp_provinsi_id;
        $data->ktp_kabupaten_id         = $request->ktp_kabupaten_id;
        $data->ktp_kecamatan_id         = $request->ktp_kecamatan_id;
        $data->ktp_kelurahan_id    = $request->ktp_kelurahan_id;
        $data->ktp_alamat               = $request->ktp_alamat;

        if ($request->hasFile('file_ktp')){
            
            $image = $request->file('file_ktp');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/file_ktp/'. Auth::user()->id);
            
            $image->move($destinationPath, $name);

            $data->foto_ktp = $name;
        }

        if ($request->hasFile('file_photo')){
            
            $image = $request->file('file_photo');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/file_photo/'. Auth::user()->id);
            
            $image->move($destinationPath, $name);
            
            $data->foto = $name;
        }
        
        $data->save();
   
        return redirect()->route('anggota.dashboard')->with('message-success', 'Profil berhasil disimpan');
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
                return redirect()->route('anggota.dashboard')->with('message-error', 'Access Denied');
            }
        }
    }
}
