<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    public function company()
    {
        return $this->belongsTo('App\Company','company_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany('App\Warehouse');
    }
}
