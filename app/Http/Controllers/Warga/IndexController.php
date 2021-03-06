<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\KeluhanDanSaran;
use App\Models\IuranWarga;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Auth;

class IndexController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        $data = [];
        $data['data']       = Users::where('id', Auth::user()->id)->first();
    
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
     * [iuranAll description]
     * @return [type] [description]
     */
    public function iuranAll()
    {  
        $params['data']             = IuranWarga::select('iuran_warga.*')->join('users','users.id','=','iuran_warga.user_id')->where('users.perumahan_id', \Auth::user()->perumahan_id)->get();
        $params['pengeluaran']      = Pengeluaran::select('pengeluaran.*')->join('users','users.id','=','pengeluaran.user_id')->where('users.perumahan_id', \Auth::user()->perumahan_id)->get();
        $total_iuran                = IuranWarga::select('iuran_warga.*')->join('users','users.id','=','iuran_warga.user_id')->where('users.perumahan_id', \Auth::user()->perumahan_id)->where('iuran_warga.status', 2);
        $total_pengeluaran          = Pengeluaran::select('pengeluaran.*')->join('users','users.id','=','pengeluaran.user_id')->where('users.perumahan_id', \Auth::user()->perumahan_id);
        
        if(isset($_GET['tahun_iuran']) and $_GET['tahun_iuran'] != "")
        {
            $total_iuran = $total_iuran->whereYear('iuran_warga.tanggal', $_GET['tahun_iuran'])->sum('nominal');
        }

        if(isset($_GET['tahun_pengeluaran']) and $_GET['tahun_pengeluaran'] != "")
        {
            $params['total_pengeluaran'] = $total_pengeluaran->whereYear('pengeluaran.tanggal', $_GET['tahun_pengeluaran']);
        }

        $params['total_iuran']          = $total_iuran->sum('nominal');
        $params['total_pengeluaran']    = $total_pengeluaran->sum('nominal');

        return view('warga.iuran-all')->with($params);
    }

    /**
     * [saveProfile description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateProfile(Request $request)
    {
        $data =  Users::where('id', Auth::user()->id)->first();
        
        if($request->password != $data->password)
        {
            if(!empty($request->password))
            {
                $this->validate($request,[
                    'confirmation'      => 'same:password',
                ]);
                $data->password             = bcrypt($request->password);
            }
        }

        $data->nik          = $request->nik; 
        $data->name         = strtoupper($request->name); 
        $data->jenis_kelamin= $request->jenis_kelamin; 
        $data->email        = $request->email;
        $data->telepon      = $request->telepon;
        $data->agama        = $request->agama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir= $request->tanggal_lahir;
        $data->passport_number          = $request->passport_number;
        $data->kk_number                = $request->kk_number;
        $data->ktp_provinsi_id      = $request->ktp_provinsi_id;
        $data->ktp_kabupaten_id     = $request->ktp_kabupaten_id;
        $data->ktp_kecamatan_id     = $request->ktp_kecamatan_id;
        $data->ktp_kelurahan_id     = $request->ktp_kelurahan_id;
        $data->ktp_alamat           = $request->ktp_alamat;
        $data->blok_rumah           = $request->blok_rumah;
        $data->perumahan_id         = $request->perumahan_id;
        $data->rt_id                = $request->rt_id;
        $data->rw_id                = $request->rw_id;
        $data->jenis_bangunan       = $request->jenis_bangunan;
        $data->status_tempat_tinggal    = $request->status_tempat_tinggal;
        $data->status_kepemilikan_rumah = $request->status_kepemilikan_rumah;
        $data->is_ktp_domisili          = $request->is_ktp_domisili;
        $data->status_pernikahan        = $request->status_pernikahan;

        if ($request->hasFile('file_ktp'))
        {    
            $image = $request->file('file_ktp');   
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_ktp/'. $data->id);
            $image->move($destinationPath, $name);
            $data->foto_ktp = $name;
        }

        if ($request->hasFile('file_photo')) 
        {    
            $image = $request->file('file_photo');   
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_photo/'. $data->id);
            $image->move($destinationPath, $name);
            $data->foto = $name;
        }

        $data->no_rumah = $request->no_rumah;
        $data->save();
   
        return redirect()->route('warga.dashboard')->with('message-success', 'Profil berhasil disimpan');
    }

    /**
     * [keluhan description]
     * @return [type] [description]
     */
    public function submitKeluhan(Request $request)
    {
        $data               = new KeluhanDanSaran();
        $data->user_id      = Auth::user()->id;
        $data->to           = $request->to;
        $data->pesan        = $request->pesan;
        $data->save();

        return redirect()->route('warga.dashboard')->with('message-success', 'Terima Kasih atas Keluhanan dan Saran Anda !');
    }

    /**
     * [backtoadmin description]
     * @return [type] [description]
     */
    public function backtoadmin()
    {
        if(\Session::get('is_login_admin'))
        {
            \Session::forget('is_login_admin');

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

    /**
     * [backtort description]
     * @return [type] [description]
     */
    public function backtort()
    {
        if(\Session::get('is_login_rt'))
        {
            \Session::forget('is_login_rt');

            $find = \App\User::where('access_id', 4)->where('rt_id', \Auth::user()->rt_id)->where('rw_id', \Auth::user()->rw_id)->first();
            
            if($find)
            {
                \Auth::loginUsingId($find->id);

                return redirect()->route('rt.dashboard')->with('message-success', 'Welcome Back Admin');
            }
        }
    }
}
