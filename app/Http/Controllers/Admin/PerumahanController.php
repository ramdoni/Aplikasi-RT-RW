<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerLogin;
use App\Models\Perumahan; 
use App\Models\PerumahanBlok; 

class PerumahanController extends ControllerLogin
{
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {        
        $params['data']     = Perumahan::orderBy('id', 'DESC')->get();

    	return view('admin.perumahan.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.perumahan.create');
    }
    
    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $data = Perumahan::where('id', $id)->first();

        return view('admin.perumahan.edit', compact('data'));
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
        $data                       =  Perumahan::where('id', $id)->first();
        $data->nama_perumahan       = $request->nama_perumahan;
        $data->provinsi_id          = $request->provinsi_id;
        $data->kabupaten_id         = $request->kabupaten_id;
        $data->kecamatan_id         = $request->kecamatan_id;
        $data->kelurahan_id         = $request->kelurahan_id;
        
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/uploads/logo-perumahan');
            
            $image->move($destinationPath, $name);

            $data->logo = $name;
        }
        $data->save();

        if(isset($request->blok))
        {
            foreach($request->blok as $i)
            {
                $blok                   = new PerumahanBlok();
                $blok->perumahan_id     = $data->id;
                $blok->blok             = $i;
                $blok->save();
            }
        }

        return redirect()->route('admin.perumahan.index')->with('message-success', 'Data Perumahan berhasil disimpan'); 
    }
    
    /**
     * [desctroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $data = Perumahan::where('id', $id)->first();
        $data->delete();

        return redirect()->route('admin.perumahan.index')->with('message-sucess', 'Data berhasi di hapus');
    }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $data                       = new Perumahan();
        $data->nama_perumahan       = $request->nama_perumahan;
        $data->provinsi_id          = $request->provinsi_id;
        $data->kabupaten_id         = $request->kabupaten_id;
        $data->kecamatan_id         = $request->kecamatan_id;
        $data->kelurahan_id         = $request->kelurahan_id;
        
        if ($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            
            $name = time().'.'.$image->getClientOriginalExtension();
            
            $destinationPath = public_path('/uploads/logo-perumahan');
            
            $image->move($destinationPath, $name);

            $data->logo = $name;
        }

        $data->save();

        if(isset($request->blok))
        {
            foreach($request->blok as $i)
            {
                $blok                   = new PerumahanBlok();
                $blok->perumahan_id     = $data->id;
                $blok->blok             = $i;
                $blok->save();
            }
        }

        return redirect()->route('admin.perumahan.index')->with('message-success', 'Data Perumahan berhasil disimpan');
   }

   /**
    * [deleteBlok description]
    * @return [type] [description]
    */
   public function deleteBlok($id)
   {
        $data = PerumahanBlok::where('id', $id)->first();
        $perumahan_id = $data->perumahan_id;
        $data->delete();

        return redirect()->route('admin.perumahan.edit', $perumahan_id)->with('message-success', 'Blok Perumahan berhasil dihapus');
   }
}
