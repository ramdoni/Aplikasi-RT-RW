<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';

    /**
     * [pengurus description]
     * @return [type] [description]
     */
    public function pengurus()
    {
    	return $this->hasMany('App\Models\RwPengurus', 'rw_id', 'id');
    }

    /**
     * [ketuaRw description]
     * @return [type] [description]
     */
    public function ketuaRw()
    {
    	return $this->hasOne('App\Models\RwPengurus', 'rw_id', 'id')->where('jabatan', 'Ketua');
    }

    /**
     * [getRt description]
     * @return [type] [description]
     */
    public function getRt()
    {
        return $this->hasMany('App\Models\Rt', 'rw_id', 'id');
    }
}
