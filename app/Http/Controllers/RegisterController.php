<?php
namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\RegisterMail;
use Mail;

class RegisterController extends Controller
{
    /**
     * [index description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function index()
    {
        return view('register.index');
    }

    /**
     * [registerPost description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function registerPost(Request $request)
    {
    	$this->validate($request,[
    		//'nik' 				=> 'required|unique:users',
    		'telepon'			=> 'required',
            'name'				=> 'required',
    		//'email'				=> 'required|email|unique:users',
    		'password'			=> 'required',
    		'confirmation'		=> 'required|same:password',
    	]);

    	$no_anggota = date('y').date('m').date('d'). (ModelUser::all()->count() + 1);
    
    	$data = new ModelUser();
    	//$data->nik 					= $request->nik;
    	$data->telepon 				= $request->telepon;
    	$data->no_anggota 			= $no_anggota;
    	$data->name 				= $request->name;
    	$data->email 				= $request->email;
    	$data->password 			= bcrypt($request->password); 
        $data->access_id            = 2; // User Sebagai Anggota
        $data->status               = 1; // menunggu pembayaran
    	$data->save();

        $data->password = $request->password;
        // send email
        Mail::to($data->email)->send(new RegisterMail($data));

    	return redirect('register/success')->with('success-register', 'Berhasil melakukan registrasi');
    }

    /**
     * [success description]
     * @return [type] [description]
     */
    public function success()
    {
        $session = session('success-register'); 
        
        if(isset($session))
            return view('success');
        else
            return redirect('home');
    }

    /**
     * [v2 description]
     * @return [type] [description]
     */
    public function v2()
    {
        return view('register.index');
    }
}