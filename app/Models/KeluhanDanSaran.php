<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeluhanDanSaran extends Model
{
    protected $table = 'keluhan_dan_saran';

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->hasOne('App\Models\Users', 'id', 'user_id');
    }
}
