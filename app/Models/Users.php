<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   	protected $table = 'users';
    
    /**
     * [perumahan description]
     * @return [type] [description]
     */
    public function perumahan()
    {
        return $this->hasOne('\App\Models\Perumahan', 'id', 'perumahan_id');
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
     * [ktpProvinsi description]
     * @return [type] [description]
     */
    public function domisiliKabupatenByProvinsi()
    {
    	return $this->hasMany('\App\Kabupaten', 'id_prov', 'domisili_provinsi_id');
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
    	return $this->hasMany('\App\Kelurahan', 'id_kec', 'domisili_kecamatan_id');
    }

     /**
     * [ktpProvinsi description]
     * @return [type] [description]
     */
    public function ktpKabupatenByProvinsi()
    {
    	return $this->hasMany('\App\Kabupaten', 'id_prov', 'ktp_provinsi_id');
    }

    /**
     * [domisiliKecamatanByKabupaten description]
     * @return [type] [description]
     */
    public function ktpKecamatanByKabupaten()
    {
    	return $this->hasMany('\App\Kecamatan', 'id_kab', 'ktp_kabupaten_id');
    }

    /**
     * [domisiliKelurahanByKecamatan description]
     * @return [type] [description]
     */
    public function ktpKelurahanByKecamatan()
    {
    	return $this->hasMany('\App\Kelurahan', 'id_kec', 'ktp_kecamatan_id');
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