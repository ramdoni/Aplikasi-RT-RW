<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';

    /**
     * [pengurus description]
     * @return [type] [description]
     */
    public function pengurus()
    {
    	return $this->hasMany('App\Models\RtPengurus', 'rt_id', 'id');
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
     * [ketuaRt description]
     * @return [type] [description]
     */
    public function ketuaRt()
    {
    	return $this->hasOne('App\Models\RtPengurus', 'rt_id', 'id')->where('jabatan', 'Ketua');
    }
}
