<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * [getBlokByPerumahan description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getBlokByPerumahan(Request $request)
    {
        $params = ['data' => [], 'message' => 'error'];
        if($request->ajax())
        {
            $data =  \App\Models\PerumahanBlok::where('perumahan_id',$request->id )->get();
            
            return response()->json(['data' => $data, 'message' => 'success']);
        }
        
        return response()->json($params);
    }

    /**
     * [getRtByRw description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getRtByRw(Request $request)
    {
        $params = ['data' => [], 'message' => 'error'];
        if($request->ajax())
        {
            $data =  \App\Models\Rt::where('rw_id',$request->id )->get();
            
            return response()->json(['data' => $data, 'message' => 'success']);
        }
        
        return response()->json($params);
    }

    /**
     * [getKaryawan description]
     * @return [type] [description]
     */
    public function getWarga(Request $request)
    {
        $params = [];
        if($request->ajax())
        {
                $data =  \App\Models\Users::where('name', 'LIKE', "%". $request->name . "%")->where('access_id', '<>', 1)->get();

                $params = [];
                foreach($data as $k => $item)
                {
                    if($k >= 10) continue;

                    $params[$k]['id'] = $item->id;
                    $params[$k]['value'] = $item->name;
                }
        }
        
        return response()->json($params); 
    }

    /**
     * [getWargaById description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getWargaById(Request $request)
    {
        $params = [];
        if($request->ajax())
        {
            $data =  \App\Models\Users::where('id', $request->id)->first();
            
            if($data)
            {
                $data->nama_perumahan = isset($data->perumahan->nama_perumahan) ? $data->perumahan->nama_perumahan : '';

                return response()->json($data); 
            }
        }
        
        return response()->json($params); 
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
            $data = \App\Models\Kabupaten::where('id_prov', $request->id)->orderBy('nama', 'ASC')->get();

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
            $data = \App\Models\Kecamatan::where('id_kab', $request->id)->orderBy('nama', 'ASC')->get();

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
            $data = \App\Models\Kelurahan::where('id_kec', $request->id)->get();

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
