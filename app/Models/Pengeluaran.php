<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    /**
     * [pengeluaranType description]
     * @return [type] [description]
     */
    public function pengeluaranType()
    {
    	return $this->hasOne('App\Models\PengeluaranType', 'id', 'pengeluaran_type_id');
    }
}
