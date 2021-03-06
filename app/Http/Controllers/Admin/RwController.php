<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rw;
use App\Models\RwPengurus;
use App\Models\Users;

class RwController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {	
    	$params['data'] = Rw::orderBy('id','DESC')->get();

    	return view('admin.rw.index')->with($params);
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create()
    {
    	return view('admin.rw.create');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
    	$params['data'] = Rw::where('id', $id)->first();

    	return view('admin.rw.edit')->with($params);
    }

    /**
     * [update description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $data           = Rw::where('id', $id)->first();
        $data->no       = $request->no;
        $data->save();

        if(isset($request->user_id))
        {
            foreach($request->user_id as $k => $i)
            {
                $pengurus           = new RwPengurus();
                $pengurus->rw_id    = $data->id;
                $pengurus->user_id  = $request->user_id[$k];
                $pengurus->jabatan  = $request->jabatan[$k];
                $pengurus->keterangan = $request->keterangan[$k];
                $pengurus->save();

                if($request->jabatan[$k] == 'Ketua')
                {
                    $user               = Users::where('id', $request->user_id)->first();
                    $user->access_id    = 5;
                    $user->save();
                }
            }
        }

        return redirect()->route('admin.rw.index')->with('message-success', 'Data Rukun Warga berhasil di simpan !');
    }

    /**
     * [store description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
    	$data 			= new Rw();
    	$data->no 	    = $request->no;
    	$data->save();

        if(isset($request->user_id))
        {
            foreach($request->user_id as $k => $i)
            {
                $pengurus           = new RwPengurus();
                $pengurus->rw_id    = $data->id;
                $pengurus->user_id  = $request->user_id[$k];
                $pengurus->jabatan  = $request->jabatan[$k];
                $pengurus->keterangan = $request->keterangan[$k];
                $pengurus->save();

                if($request->jabatan[$k] == 'Ketua')
                {
                    $user               = Users::where('id', $request->user_id)->first();
                    $user->access_id    = 5;
                    $user->save();
                }
            }
        }

    	return redirect()->route('admin.rw.index')->with('message-success', 'Data RW berhasil di simpan !');
    }

    /**
     * [destroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	$data = Rw::where('id', $id)->first();
    	$data->delete();

        $pengurus = RwPengurus::where('rw_id', $id)->delete();

    	return redirect()->route('admin.rw.index')->with('message-success', 'Data RW berhasil di hapus !');
    }

    /**
     * [deletePengurus description]
     * @param  [type] $id    [description]
     * @param  [type] $rw_id [description]
     * @return [type]        [description]
     */
    public function deletePengurus($id, $rw_id)
    {
        $pengurus           = RwPengurus::where('id', $id)->first();
        
        $user               = Users::where('id', $pengurus->user_id)->first();
        $user->access_id    = 2;
        $user->save();
        $pengurus->delete();
        
        return redirect()->route('admin.rw.edit', $rw_id)->with('message-success', 'Data Pengurus RW berhasil di hapus !');
    }
}
