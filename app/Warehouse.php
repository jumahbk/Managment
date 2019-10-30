<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch','branch_id', 'id');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
}
