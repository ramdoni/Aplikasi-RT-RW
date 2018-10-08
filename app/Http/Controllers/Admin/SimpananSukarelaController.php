<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodami\Models\Mysql\Deposit;

class SimpananSukarelaController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$data = Deposit::where('type', 4)->get();

    	return view('admin.simpanan-sukarela.index', compact('data'));
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        $params['no_anggota'] = date('y').date('m').date('d'). (ModelUser::all()->count() + 1);

        return view('admin.anggota.create')->with($params);
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $user = \App\UserModel::where('id', $id)->first();
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
        $data =  ModelUser::where('id', $id)->first();
        
        $data->nik         = $request->nik; 
        $data->name        = $request->name; 
        $data->jenis_kelamin= $request->jenis_kelamin; 
        $data->email        = $request->email;
        $data->telepon      = $request->telepon;
        $data->agama        = $request->agama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->passport_number          = $request->passport_number;
        $data->kk_number                = $request->kk_number;
        $data->npwp_number              = $request->npwp_number;
        $data->bpjs_number              = $request->bpjs_number; 

        $data->domisili_provinsi_id     = $request->domisili_provinsi_id;
        $data->domisili_kabupaten_id    = $request->domisili_kabupaten_id;
        $data->domisili_kecamatan_id    = $request->domisili_kecamatan_id;
        $data->domisili_kelurahan_id    = $request->domisili_kelurahan_id;
        $data->domisili_alamat          = $request->domisili_alamat;

        $data->ktp_provinsi_id      = $request->ktp_provinsi_id;
        $data->ktp_kabupaten_id     = $request->ktp_kabupaten_id;
        $data->ktp_kecamatan_id     = $request->ktp_kecamatan_id;
        $data->ktp_kelurahan_id     = $request->ktp_kelurahan_id;
        $data->ktp_alamat           = $request->ktp_alamat;

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
        $data = ModelUser::where('id', $id)->first();
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
        $data               =  new ModelUser();
        $data->no_anggota   = $request->no_anggota;
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
        $data->npwp_number              = $request->npwp_number;
        $data->bpjs_number              = $request->bpjs_number;

        $data->domisili_provinsi_id     = $request->domisili_provinsi_id;
        $data->domisili_kabupaten_id    = $request->domisili_kabupaten_id;
        $data->domisili_kecamatan_id    = $request->domisili_kecamatan_id;
        $data->domisili_kelurahan_id    = $request->domisili_kelurahan_id;
        $data->domisili_alamat          = $request->domisili_alamat;

        $data->ktp_provinsi_id      = $request->ktp_provinsi_id;
        $data->ktp_kabupaten_id     = $request->ktp_kabupaten_id;
        $data->ktp_kecamatan_id     = $request->ktp_kecamatan_id;
        $data->ktp_kelurahan_id     = $request->ktp_kelurahan_id;
        $data->ktp_alamat           = $request->ktp_alamat;
        
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
        
        $data->save();

        return redirect()->route('admin.anggota.index')->with('message-success', 'Data berhasil disimpan'); 
   }
}
