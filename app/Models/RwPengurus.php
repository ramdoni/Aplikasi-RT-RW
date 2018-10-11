<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RwPengurus extends Model
{
    protected $table = 'rw_pengurus';

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->hasOne('App\Models\Users', 'id', 'user_id');
    }
}
