<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    protected $table = 'rekening_bank';

    /**
     * [bank description]
     * @return [type] [description]
     */
    public function bank()
    {
    	return $this->hasOne('App\Models\Bank', 'id', 'bank_id');
    }
}
