<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   	protected $table = 'users';
    
    /**
     * [domisiliKecamatan description]
     * @return [type] [description]
     */
    public function domisiliKecamatan()
    {
        return $this->hasOne('\App\Models\Kecamatan', 'id_kec', 'domisili_kecamatan_id');
    }

    /**
     * [perumahan description]
     * @return [type] [description]
     */
    public function perumahan()
    {
        return $this->hasOne('\App\Models\Perumahan', 'id', 'perumahan_id');
    }

    /**
     * [blokrumah description]
     * @return [type] [description]
     */
    public function blokrumah()
    {
        return $this->hasOne('\App\Models\PerumahanBlok', 'id', 'blok_rumah');
    }

    /**
     * [rw description]
     * @return [type] [description]
     */
    public function rw()
    {
    	return $this->hasOne('App\Models\Rw', 'id', 'rw_id');
    }

    /**
     * [rt description]
     * @return [type] [description]
     */
    public function rt()
    {
        return $this->hasOne('App\Models\Rt', 'id', 'rt_id');
    }
    
    /**
     * [ktpProvinsi description]
     * @return [type] [description]
     */
    public function domisiliKabupatenByProvinsi()
    {
    	return $this->hasMany('\App\Models\Kabupaten', 'id_prov', 'domisili_provinsi_id');
    }

    /**
     * [domisiliKecamatanByKabupaten description]
     * @return [type] [description]
     */
    public function domisiliKecamatanByKabupaten()
    {
    	return $this->hasMany('\App\Kecamatan', 'id_kab', 'domisili_kabupaten_id');
    }

    /**
     * [domisiliKelurahanByKecamatan description]
     * @return [type] [description]
     */
    public function domisiliKelurahanByKecamatan()
    {
    	return $this->hasMany('\App\Models\Kelurahan', 'id_kec', 'domisili_kecamatan_id');
    }

     /**
     * [ktpProvinsi description]
     * @return [type] [description]
     */
    public function ktpKabupatenByProvinsi()
    {
    	return $this->hasMany('\App\Models\Kabupaten', 'id_prov', 'ktp_provinsi_id');
    }

    /**
     * [domisiliKecamatanByKabupaten description]
     * @return [type] [description]
     */
    public function ktpKecamatanByKabupaten()
    {
    	return $this->hasMany('\App\Models\Kecamatan', 'id_kab', 'ktp_kabupaten_id');
    }

    /**
     * [domisiliKelurahanByKecamatan description]
     * @return [type] [description]
     */
    public function ktpKelurahanByKecamatan()
    {
    	return $this->hasMany('\App\Models\Kelurahan', 'id_kec', 'ktp_kecamatan_id');
    }

    /**
     * [bank description]
     * @return [type] [description]
     */
    public function RekeningBankUser()
    {
        return $this->hasMany('\App\Models\RekeningBankUser', 'user_id', 'id');
    }
}