<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Models\Users; 

class AnggotaController extends ControllerLogin
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$data = Users::orderBy('id', 'DESC')->get();

    	return view('admin.anggota.index', compact('data'));
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
        $data->access_id    = $request->access_id; // Akses sebagai anggota
        $data->save();

        return redirect()->route('admin.anggota.edit', $data->id)->with('message-success', 'Data berhasil disimpan'); 
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

        return redirect()->route('admin.anggota.index')->with('message-sucess', 'Data berhasi di hapus');
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
        $data->name         = strtoupper($request->name); 
        $data->jenis_kelamin= $request->jenis_kelamin; 
        $data->email        = $request->email;
        $data->telepon      = $request->telepon;
        $data->agama        = $request->agama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir= $request->tanggal_lahir;
        $data->password     = bcrypt($request->password); 
        $data->access_id    = $request->access_id; // Akses sebagai anggota
        $data->status       = 1; // menunggu pembayaran 
        $data->status_login =1;
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
        $data->no_rumah                 = $request->no_rumah;
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
        $data->save();

        return redirect()->route('admin.anggota.edit', $data->id)->with('message-success', 'Data berhasil disimpan'); 
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
            if($user->access_id == 2)
            {
                \Auth::loginUsingId($id);

                \Session::put('is_login_admin', true);
            
                return redirect()->route('warga.dashboard');
            }

            if($user->access_id == 4)
            {
                \Auth::loginUsingId($id);

                \Session::put('is_login_admin', true);
            
                return redirect()->route('rt.dashboard');
            }

            return redirect()->back()->with('message-error', 'Maaf akses login ini belum tersedia !');
        }
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
        return redirect()->route('admin.anggota.index')->with('message-success', 'Status warga sudah Aktif');
    }
}
