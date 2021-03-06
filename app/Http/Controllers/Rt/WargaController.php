<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Models\Users; 

class WargaController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$data = Users::where('access_id', 2)->where('perumahan_id', \Auth::user()->perumahan_id)->orderBy('id', 'DESC')->get();

    	return view('rt.warga.index', compact('data'));
    }

    /**
     * [confirm description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function confirm($id)
    {
        $params['data']         = Users::where('id', $id)->first();
        $params['deposit']      = \Kodami\Models\Mysql\Deposit::where('type', 1)->where('user_id', $id)->first();

        return view('admin.anggota.confirm')->with($params);
    }

    /**
     * [confirmSubmit description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function confirmSubmit(Request $request)
    {
        if($request->status == 1)
        {
            $status = \Kodami\Models\Mysql\Deposit::where('id', $request->deposit_id)->first();
            $status->status = 3;
            $status->proses_user_id = \Auth::user()->id;
            $status->save(); 

            $user = \App\UserModel::where('id', $status->user_id)->first();

            /** Rubah status angota jadi active */
            $user = Users::where('id', $status->user_id)->first();
            $user->status = 2;
            $user->save();

            // Insert Simpanan Pokok
            $deposit                = new \Kodami\Models\Mysql\Deposit();
            $deposit->no_invoice    = $status->no_invoice; 
            $deposit->status        = 3;
            $deposit->type          = 3; // Simpanan Pokok
            $deposit->user_id       = $status->user_id;
            $deposit->nominal       = get_setting('simpanan_pokok');
            $deposit->proses_user_id = \Auth::user()->id;
            $deposit->save();  

            // Insert Simpanan Wajib
            $deposit                = new \Kodami\Models\Mysql\Deposit();
            $deposit->no_invoice    = $status->no_invoice; 
            $deposit->status        = 3; 
            $deposit->type          = 5; // Simpanan Wajib
            $deposit->user_id       = $status->user_id;
            $deposit->nominal       = $user->durasi_pembayaran * get_setting('simpanan_wajib');
            $deposit->proses_user_id = \Auth::user()->id;
            $deposit->save();

            // Insert Simpanan Sukarela
            $deposit                = new \Kodami\Models\Mysql\Deposit();
            $deposit->no_invoice    = $status->no_invoice; 
            $deposit->status        = 3; 
            $deposit->type          = 4; // Simpanan Sukarela
            $deposit->user_id       = $status->user_id;
            $deposit->nominal       = $user->first_simpanan_sukarela + $status->code;
            $deposit->proses_user_id = \Auth::user()->id;
            $deposit->save();
        }
        else
        {
            $deposit = \Kodami\Models\Mysql\Deposit::where('id', $id)->first();
            $deposit->status = 4;
            $status->proses_user_id = \Auth::user()->id;
            $deposit->save();

             /** Rubah status angota jadi reject */
            $user = Users::where('id', $deposit->user_id)->first();
            $user->status = 3;
            $user->save();
        }

        return redirect()->route('admin.anggota.index')->with('message-success', 'Data berhasil di konfirmasi');
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        $params['no_anggota'] = date('y').date('m').date('d'). (Users::all()->count() + 1);

        return view('admin.anggota.create')->with($params);
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $user = Users::where('id', $id)->first();
        $data['data'] 	= $user;
        $data['id'] 	= $id;
        
        return view('admin.anggota.edit')->with($data);
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
        $data =  Users::where('id', $id)->first();
        
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
        $data->name         = $request->name; 
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

        if ($request->hasFile('file_npwp')) 
        {    
            $image = $request->file('file_npwp');   
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_npwp/'. $data->id);
            $image->move($destinationPath, $name);
            $data->file_npwp = $name;
        }
        $data->status = $request->status;
        $data->save();

        return redirect()->route('rt.anggota.edit', $data->id)->with('message-success', 'Data berhasil disimpan'); 
    }


    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = Users::where('id', $id)->first();
        $data->delete();

        return redirect()->route('rt.warga.index')->with('message-success', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data               =  new Users();
        $data->nik          = $request->nik; 
        $data->name         = $request->name; 
        $data->jenis_kelamin= $request->jenis_kelamin; 
        $data->email        = $request->email;
        $data->telepon      = $request->telepon;
        $data->agama        = $request->agama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir= $request->tanggal_lahir;
        $data->password             = bcrypt($request->password); 
        $data->access_id    = 2; // Akses sebagai anggota
        $data->status       = 1; // menunggu pembayaran 
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
        $data->save();

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

        if ($request->hasFile('file_npwp')) 
        {    
            $image = $request->file('file_npwp');   
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_npwp/'. $data->id);
            $image->move($destinationPath, $name);
            $data->file_npwp = $name;
        }
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.anggota.edit', $data->id)->with('message-success', 'Data berhasil disimpan'); 
   }

   /**
    * [cetakKwitansi description]
    * @param  [type] $id [description]
    * @return [type]     [description]
    */
   public function cetakKwitansi($id)
   {
        $params['data']     = \Kodami\Models\Mysql\Deposit::where('id', $id)->first();

        return view('rt.anggota.kwitansi')->with($params);
   }

   /**
    * [topupSimpananPokok description]
    * @param  Request $request [description]
    * @return [type]           [description]
    */
    public function topupSimpananPokok(Request $request)
    {
        $deposit                = new \Kodami\Models\Mysql\Deposit();
        $deposit->no_invoice    = no_invoice(); 
        $deposit->status        = 3;
        $deposit->type          = 3;
        $deposit->user_id       = $request->user_id;
        $deposit->nominal       = $request->nominal;
        $deposit->proses_user_id = \Auth::user()->id;
        $deposit->save();  

        return redirect()->route('admin.anggota.edit', $request->user_id)->with('message-success', 'Topup Simpanan Pokok berhasil !');
    }

    /**
     * [topupSimpananWajib description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function topupSimpananWajib(Request $request)
    {
        $user                       = \App\UserModel::where('id', $request->user_id)->first();
        $user->durasi_pembayaran    = $request->durasi_pembayaran;
        $user->first_durasi_pembayaran_date = date('Y-m-d');
        $user->save();

        $deposit                = new \Kodami\Models\Mysql\Deposit();
        $deposit->no_invoice    = no_invoice(); 
        $deposit->status        = 3; 
        $deposit->type          = 5; // Simpanan Wajib
        $deposit->user_id       = $request->user_id;
        $deposit->nominal       = $request->durasi_pembayaran * $request->nominal;
        $deposit->proses_user_id = \Auth::user()->id;
        $deposit->save();

        return redirect()->route('admin.anggota.edit', $request->user_id)->with('message-success', 'Topup Simpanan Wajib berhasil !');
    }

    /**
     * [autologin description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function autologin($id)
    {
        $user = Users::where('id', $id)->first();
        if($user)
        {
            \Auth::loginUsingId($id);

            if($user->access_id == 2)
            {
                \Session::put('is_login_rt', true);
            
                return redirect()->route('warga.dashboard');
            }
        }
    }

    /*
     * [deteleBank description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteBank($id, $user_id)
    {
        $bank = \Kodami\Models\Mysql\RekeningBankUser::where('id', $id)->first();
        $bank->delete();

        return redirect()->route('admin.anggota.edit', $user_id)->with('message-success', 'Data Bank berhasil dihapus !');
    }

    /**
     * [addRekeningBank description]
     * @param Request $request [description]
     */
    public function addRekeningBank(Request $request)
    {
        $data                   = new \Kodami\Models\Mysql\RekeningBankUser();
        $data->nama_akun        = $request->nama_akun;
        $data->no_rekening      = $request->no_rekening;
        $data->bank_id          = $request->bank_id;
        $data->cabang           = $request->cabang;
        $data->user_id          = $request->user_id;
        $data->save();

        return redirect()->route('admin.anggota.edit', $request->user_id)->with('message-success', 'Data Rekening Bank berhasil disimpan !');
    }

    /**
     * [aktif description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function aktif($id)
    {
        $data           = Users::where('id', $id)->first();
        $data->status   = 1;
        $data->save();
        return redirect()->route('rt.warga.index')->with('message-success', 'Status warga sudah Aktif');
    }
}
