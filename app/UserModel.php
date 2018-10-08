<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    
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
        return $this->hasMany('\Kodami\Models\Mysql\RekeningBankUser', 'user_id', 'id');
    }

}
