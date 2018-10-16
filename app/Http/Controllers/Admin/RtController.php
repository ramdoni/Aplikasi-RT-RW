<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\RtPengurus;
use App\Models\Users;

class RtController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$params['data'] = Rt::orderBy('id','DESC')->get();

    	return view('admin.rt.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
    	return view('admin.rt.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
    	$params['data'] = Rt::where('id', $id)->first();

    	return view('admin.rt.edit')->with($params);
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $data           = Rt::where('id', $id)->first();
        $data->no       = $request->no;
        $data->rw_id    = $request->rw_id;
        $data->save();

        if(isset($request->user_id))
        {
            foreach($request->user_id as $k => $i)
            {
                $pengurus           = new RtPengurus();
                $pengurus->rt_id    = $data->id;
                $pengurus->user_id  = $request->user_id[$k];
                $pengurus->jabatan  = $request->jabatan[$k];
                $pengurus->keterangan = $request->keterangan[$k];
                $pengurus->save();

                if($request->jabatan[$k] == 'Ketua')
                {
                    $user               = Users::where('id', $request->user_id)->first();
                    $user->access_id    = 4;
                    $user->save();
                }
            }
        }

        return redirect()->route('admin.rt.index')->with('message-success', 'Data RT berhasil di simpan !');
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
    	$data           = new Rt();
    	$data->no 	    = $request->no;
        $data->rw_id    = $request->rw_id;
    	$data->save();

        if(isset($request->user_id))
        {
            foreach($request->user_id as $k => $i)
            {
                $pengurus           = new RtPengurus();
                $pengurus->rt_id    = $data->id;
                $pengurus->user_id  = $request->user_id[$k];
                $pengurus->jabatan  = $request->jabatan[$k];
                $pengurus->keterangan = $request->keterangan[$k];
                $pengurus->save();

                if($request->jabatan[$k] == 'Ketua')
                {
                    $user               = Users::where('id', $request->user_id)->first();
                    $user->access_id    = 4;
                    $user->save();
                }
            }
        }

    	return redirect()->route('admin.rt.index')->with('message-success', 'Data RT berhasil di simpan !');
    }

    /**
     * [destroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	$data = Rt::where('id', $id)->first();
    	$data->delete();

        $pengurus = RtPengurus::where('rt_id', $id)->delete();

    	return redirect()->route('admin.rt.index')->with('message-success', 'Data RT berhasil di hapus !');
    }
}
