<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kodami\Models\Mysql\RekeningBankUser;

class AjaxAdminController extends Controller
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
     * [submitSimpananSukarela description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function submitSimpananSukarela(Request $request)
    {
        if($request->ajax())
        {   
            $deposit                    = new \Kodami\Models\Mysql\Deposit();
            $deposit->no_invoice        = no_invoice();
            $deposit->user_id           = $request->user_id;
            $deposit->status            = 3;
            $deposit->nominal           = $request->nominal;
            $deposit->type              = 4;
            $deposit->proses_user_id    = \Auth::user()->id;
            $deposit->save(); 

            $this->respon = ['message' => 'success'];

            return response()->json($this->respon);
        }
    }
}