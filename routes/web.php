<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
date_default_timezone_set("Asia/Bangkok");

Route::get('/', function () {

	if(Auth::check())
    {
    	switch (Auth::user()->access_id) {
    		case 1:
            	return redirect()->route('admin.dashboard');
    			break;
    		case 2:
            	return redirect()->route('warga.dashboard');
    			break;
    		case 3:
            	return redirect()->route('bendahara.dashboard');
    			break;
    		case 4:
            	return redirect()->route('rt.dashboard');
    			break;
    		default:
    			break;
    	}
    }

    return view('auth.register');
});
Route::get('home', function () {
	if(Auth::check())
    {
    	switch (Auth::user()->access_id) {
    		case 1:
            	return redirect()->route('admin.dashboard');
    			break;
    		case 2:
            	return redirect()->route('warga.dashboard');
    			break;
    		case 3:
            	return redirect()->route('bendahara.dashboard');
    			break;
    		case 4:
            	return redirect()->route('rt.dashboard');
    			break;
    		default:
    			break;
    	}
    }
    return view('auth.register');
});

Route::get('register/success', 'RegisterController@success');
Route::get('register', 'RegisterController@index');
Route::post('register-submit', 'RegisterController@submit')->name('register.submit');
Route::get('logout', 'Auth\LoginController@logout');
 
// ROUTING LOGIN
Route::group(['middleware' => ['auth']], function(){
	Route::post('ajax/get-kabupaten-by-provinsi', 'AjaxController@getKabupatenByProvinsi')->name('ajax.get-kabupaten-by-provinsi-id');
	Route::post('ajax/get-kecamatan-by-kabupaten', 'AjaxController@getKecamatanByKabupaten')->name('ajax.get-kecamatan-by-kabupaten-id');
	Route::post('ajax/get-kelurahan-by-kecamatan', 'AjaxController@getKelurahanByKecamatan')->name('ajax.get-kelurahan-by-kecamatan-id');
	Route::post('ajax-admin/submit-simpanan-sukarela', 'AjaxAdminController@submitSimpananSukarela')->name('ajax.admin.submit-simpanan-sukarela');
	Route::post('ajax/get-anggota', 'AjaxController@getAnggota')->name('ajax.get-anggota');
	Route::post('ajax/get-anggota-by-id', 'AjaxController@getAnggotaById')->name('ajax.get-anggota-by-id');
	Route::post('ajax/get-anggota-by-id-html', 'AjaxController@getAnggotaByIdHtml')->name('ajax.get-anggota-by-id-html');
	Route::post('ajax/get-warga', 'AjaxController@getWarga')->name('ajax.get-warga');
	Route::post('ajax/get-rt-by-rw', 'AjaxController@getRtByRw')->name('ajax.get-rt-by-rw');
	Route::post('ajax/get-blok-by-perumahan', 'AjaxController@getBlokByPerumahan')->name('ajax.get-blok-by-perumahan');
});

// ROUTING ADMIN 
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'access:1']], function(){
	Route::resource('user','UserController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('user-group','UserGroupController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'user-group']);
	Route::resource('anggota','AnggotaController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('simpanan-sukarela','SimpananSukarelaController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('simpanan-pokok','SimpananPokokController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('simpanan-wajib','SimpananWajibController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('bank','BankController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('rekening-bank','RekeningBankController',['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('bank','BankController',['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('general-setting','SettingController',['as' => 'admin']);
	Route::resource('iuran','IuranController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('perumahan','PerumahanController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('rw','RwController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('rt','RtController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('user-access','UserAccessController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::resource('surat-pengantar', 'SuratPengantarController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'admin']);
	Route::get('/','IndexController@index')->name('admin.index');
	Route::get('/','IndexController@index')->name('admin.dashboard');
	Route::get('profile','UserController@profile')->name('admin.profile');
	Route::get('contact-us','ContactUsController@index')->name('admin.contact-us');
	Route::get('anggota/destroy/{id}','AnggotaController@destroy')->name('admin.anggota.destroy');
	Route::get('perumahan/delete-blok/{id}','PerumahanController@deleteBlok')->name('admin.perumahan.delete-blok');
	Route::get('rekening-bank/mutasi/{id}','RekeningBankController@mutasi')->name('admin.rekening-bank.mutasi');
	Route::get('setting','IndexController@setting')->name('admin.setting.index');
	Route::get('user/autologin/{id}','UserController@autologin')->name('admin.user.autologin');
	Route::get('bayar/approve/{id}','BayarAdminController@approve')->name('admin.bayar.approve');
	Route::get('bayar/denied/{id}','BayarAdminController@denied')->name('admin.bayar.denied');
	Route::get('anggota/confirm/{id}','AnggotaController@confirm')->name('admin.anggota.confirm');
	Route::get('anggota/cetak-kwitansi/{id}','AnggotaController@cetakKwitansi')->name('admin.anggota.cetak-kwitansi');
	Route::get('autologin/{id}','AnggotaController@autologin')->name('admin.autologin');
	Route::get('moote-bank','MootaBankController@index')->name('admin.moota-bank.index');
	Route::get('moote-bank-mutasi/{bank_id}/{bank_type}','MootaBankController@mutasi')->name('admin.moota-bank.mutasi');
	Route::get('user/delete-bank/{id}/{user_id}','AnggotaController@deleteBank')->name('admin.user.delete-bank');
	Route::get('anggota/aktif/{id}', 'AnggotaController@aktif')->name('admin.anggota.aktif');
	Route::get('iuran-warga', 'IuranWargaController@index')->name('admin.iuran-warga.index');
	Route::get('surat-pengantar/proses/{id}', 'SuratPengantarController@proses')->name('admin.surat-pengantar.proses');
	Route::get('iuran-warga/bayar-rollback/{id}', 'IuranWargaController@BayarRollback')->name('admin.iuran-warga.bayar-rollback');
	Route::get('rw/delete-pengurus/{id}/{rw_id}', 'RwController@deletePengurus')->name('admin.rw.delete-pengurus');
	Route::get('rt/delete-pengurus/{id}/{rt_id}', 'RtController@deletePengurus')->name('admin.rt.delete-pengurus');
	Route::get('keluhan-dan-saran', 'IndexController@keluhan')->name('admin.keluhan-dan-saran');
	Route::post('anggota/topup-simpanan-pokok','AnggotaController@topupSimpananPokok')->name('admin.anggota.topup-simpanan-pokok');
	Route::post('anggota/topup-simpanan-wajib','AnggotaController@topupSimpananWajib')->name('admin.anggota.topup-simpanan-wajib');
	Route::post('anggota/add-rekening-bank','AnggotaController@addRekeningBank')->name('admin.anggota.add-rekening-bank');
	Route::post('anggota/confirm-submit','AnggotaController@confirmSubmit')->name('admin.anggota.confirm-submit');
	Route::post('iuran-warga/bayar', 'IuranWargaController@bayar')->name('admin.iuran-warga.bayar');
});

// ROUTING WARGA
Route::group(['prefix' => 'warga', 'namespace' => 'Warga', 'middleware' => ['auth', 'access:2']], function(){
	Route::get('/', 'IndexController@index')->name('warga.dashboard');
	Route::get('profile', 'IndexController@profile')->name('warga.profile');
	Route::get('user/konfirmasi-pembayaran', 'UserController@konfirmasiPembayaran');
	Route::get('back-to-admin', 'IndexController@backtoadmin')->name('warga.back-to-admin');	
	Route::get('user/submit-pembayaran-warga', 'UserController@submitkonfirmasianggota');
	Route::get('user/post-submit-pembayaran-warga', 'UserController@submitkonfirmasianggota');
	Route::get('bayar', 'BayarController@step1')->name('warga.bayar');
	Route::get('iuran', 'IuranController@index')->name('warga.iuran.index');
	Route::post('submit-keluhan', 'IndexController@submitKeluhan')->name('warga.submit-keluhan');
	Route::post('user/post-konfirmasi-pembayaran', 'UserController@postKonfirmasiPembayaran');
	Route::post('save-profile', 'IndexController@saveProfile')->name('warga.index.save.profile');
	Route::post('submitstep1', 'BayarController@submitStep1')->name('warga.submit-step1');
	Route::post('warga/bayar/submit', 'BayarController@submit')->name('warga.bayar.submit');
	Route::post('warga/add-rekening-bank', 'BayarController@addRekeningBank')->name('warga.bayar.add-rekening-bank');
	Route::post('upload-confirmation', 'BayarController@confirmation')->name('warga.upload.confirmation');
	Route::post('iuran/bayar', 'IuranController@bayar')->name('warga.iuran.bayar');
	Route::post('surat-pengantar/request-submit', 'SuratPengantarController@requestSubmit')->name('warga.surat-pengantar.request-submit');
	Route::post('update-profile', 'IndexController@updateProfile')->name('warga.update-profile');
	Route::resource('rekening-bank-user', 'RekeningBankUserController');
	Route::resource('simpanan-sukarela', 'SimpananSukarelaController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'warga']);
	Route::resource('surat-pengantar-domisili', 'SuratPengantarDomisiliController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'warga']);
	Route::resource('surat-pengantar-rt', 'SuratPengantarRtController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'warga']);
	Route::resource('surat-pengantar', 'SuratPengantarController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'warga']);
});

// ROUTING BENDAHARA
Route::group(['prefix' => 'bendahara', 'namespace' => 'Bendahara', 'middleware' => ['auth', 'access:3']], function(){
	Route::get('/', 'IndexController@index')->name('bendahara.dashboard');
	Route::get('back-to-admin', 'IndexController@backtoadmin')->name('bendahara.back-to-admin');	
});

// ROUTE RT
Route::group(['prefix' => 'rt', 'namespace' => 'Rt', 'middleware' => ['auth', 'access:4']], function(){
	Route::get('/', 'IndexController@index')->name('rt.dashboard');
	Route::get('back-to-admin', 'IndexController@backtoadmin')->name('rt.back-to-admin');
	Route::get('iuran', 'IuranController@index')->name('rt.iuran.index');
	Route::get('autologin/{id}','WargaController@autologin')->name('rt.autologin');
	Route::get('iuran/bayar-rollback/{id}', 'IuranController@BayarRollback')->name('rt.iuran.bayar-rollback');
	Route::get('surat-pengantar', 'SuratPengantarController@index')->name('rt.surat-pengantar.index');
	Route::get('surat-pengantar/proses/{id}', 'SuratPengantarController@proses')->name('rt.surat-pengantar.proses');
	Route::post('iuran/bayar', 'IuranController@bayar')->name('rt.iuran.bayar');
	Route::resource('warga', 'WargaController', ['only'=> ['index','create','store', 'edit','destroy','update'], 'as' => 'rt']);
});

Auth::routes();
?>