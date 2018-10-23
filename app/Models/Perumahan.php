<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $table = 'perumahan';

    /**
     * [domisiliKabupatenByProvinsi description]
     * @return [type] [description]
     */
    public function provinsi()
    {
    	return $this->hasOne('\App\Models\Provinsi', 'id_prov', 'provinsi_id');
    }

    /**
     * [kabupaten description]
     * @return [type] [description]
     */
    public function kabupaten()
    {
    	return $this->hasOne('\App\Models\Kabupaten', 'id_kab', 'kabupaten_id');
    }

    /**
     * [kecamatan description]
     * @return [type] [description]
     */
    public function kecamatan()
    {
    	return $this->hasOne('\App\Models\Kecamatan', 'id_kec', 'kecamatan_id');
    }

    /**
     * [kelurahan description]
     * @return [type] [description]
     */
    public function kelurahan()
    {
    	return $this->hasOne('\App\Models\Kelurahan', 'id_kel', 'kelurahan_id');
    }

    /**
     * [getKabupatenByProvinsi description]
     * @return [type] [description]
     */
    public function getKabupatenByProvinsi()
    {
        return $this->hasMany('\App\Models\Kabupaten', 'id_prov', 'provinsi_id');
    }

    /**
     * [getKecamatanByKabupaten description]
     * @return [type] [description]
     */
    public function getKecamatanByKabupaten()
    {
        return $this->hasMany('\App\Models\Kecamatan', 'id_kab', 'kabupaten_id');
    }

    /**
     * [getKelurahanByKecamatan description]
     * @return [type] [description]
     */
    public function getKelurahanByKecamatan()
    {
        return $this->hasMany('\App\Models\Kelurahan', 'id_kec', 'kecamatan_id');
    }

    /**
     * [getBlok description]
     * @return [type] [description]
     */
    public function getBlok()
    {
        return $this->hasMany('App\Models\PerumahanBlok', 'perumahan_id', 'id')->orderBy('blok', 'DESC');
    }
}