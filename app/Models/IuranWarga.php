<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IuranWarga extends Model
{
    protected $table = 'iuran_warga';

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
    	return $this->hasOne('\App\Models\Users', 'id', 'user_id');
    }
}
