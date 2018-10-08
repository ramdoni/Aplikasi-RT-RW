<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kodami\Models\Mysql\RekeningBankUser;

class AjaxController extends Controller
{
    protected $respon;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        /**
         * [$this->respon description]
         * @var [type]
         */
        $this->respon = ['message' => 'error', 'data' => []];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ;
    }

    /**
     * [getAnggotaById description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getAnggotaByIdHtml(Request $request)
    {
        $this->respon = ['message' => 'error', 'data' => []];
        
        if($request->ajax())
        {
            $data =  \Kodami\Models\Mysql\Users::where('id',$request->id)->first();
            if($data)
            {
                $data = view('kasir.partial.anggota-search')->with(['data' => $data])->render();

                $this->respon = ['message' => 'success', 'data' => $data];
            }
            else
            {
                $this->respon = ['message' => 'error', 'data' => []];
            }
        }

        return response()->json($this->respon);
    }

    /**
     * [getAnggota description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getAnggota(Request $request)
    {
        $this->respon = ['message' => 'error', 'data' => []];
        
        if($request->ajax())
        {
            $data =  \Kodami\Models\Mysql\Users::where('access_id', 2)->where(function($table) use ($request){
                $table->where('name', 'LIKE', "%". $request->name . "%")
                      ->orWhere('no_anggota', 'LIKE', '%'. $request->name .'%');
            })->get();

            $params = [];
            foreach($data as $k => $item)
            {
                if($k >= 10) continue;

                $params[$k]['id'] = $item->id;
                $params[$k]['value'] = $item->no_anggota .' - '. $item->name;
            }

            $this->respon = ['message' => 'success', 'data' => $params];
        }

        return response()->json($this->respon);
    }

    /**
     * [getKabupatenByProvinsi description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getKabupatenByProvinsi(Request $request)
    {
        if($request->ajax())
        {
            $data = \App\Kabupaten::where('id_prov', $request->id)->get();

            $this->respon = ['message' => 'success', 'data' => $data];

            return response()->json($this->respon);
        }
    }

    /**
     * [getKecamatanByKabupaten description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getKecamatanByKabupaten(Request $request)
    {
        if($request->ajax())
        {
            $data = \App\Kecamatan::where('id_kab', $request->id)->get();

            $this->respon = ['message' => 'success', 'data' => $data];

            return response()->json($this->respon);
        }
    }

    /**
     * [getKelurahanByKecamatan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getKelurahanByKecamatan(Request $request)
    {
        if($request->ajax())
        {
            $data = \App\Kelurahan::where('id_kec', $request->id)->get();

            $this->respon = ['message' => 'success', 'data' => $data];

            return response()->json($this->respon);
        }
    }

    /**
     * [postContactUs description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function addRekeningBank(Request $request)
    {
        if($request->ajax())
        {
            $data               = new RekeningBankUser();
            $data->nama_akun    = $request->nama_akun;
            $data->no_rekening  = $request->no_rekening;
            $data->bank_id      = $request->bank_id;
            $data->cabang       = $request->cabang;
            $data->user_id      = $request->user_id; 
            $data->save();

            $data->image = $data->bank->image;

            $this->respon = ['message' => 'success', 'data' => $data];

            return response()->json($this->respon);
        }else 
            return response()->json($this->respon);
    }

    /**
     * [deleteRekeningBankUser description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteRekeningBankUser($id)
    {
        $this->respon = ['message' => 'error', 'data' => []];

        if($request->ajax())
        {
            $data = RekeningBankUser::where('id', $id)->first();
            $data->delete();

            $this->respon = ['message' => 'success', 'data' => []];

            return response()->json($this->respon);

        }else 
            return response()->json($this->respon);
    }   
}
