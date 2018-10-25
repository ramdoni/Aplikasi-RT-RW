<?php

namespace App\Http\Controllers\Rt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeluhanDanSaran;
use App\Models\IuranWarga;
use App\Models\Pengeluaran;

class IndexController extends Controller
{	
    
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
        return view('rt.index');
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

        return view('rt.iuran-all')->with($params);
    }

    /**
     * [backtoadmin description]
     * @return [type] [description]
     */
    public function backtoadmin()
    {
        if(\Session::get('is_login_admin'))
        {
            $find = \App\Models\Users::where('access_id', 1)->first();
            
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
}
