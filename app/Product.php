<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function vendor()
    {
        return $this->belongsTo('App\Vendor','vendor_id', 'id');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit','unit_id', 'id');
    }


}
