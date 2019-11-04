<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product','product_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }


    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse','warehouse_id', 'id');
    }


    public function Stocklog()
    {
        return $this->hasMany('App\Stocklog');
    }
    public function useSingleUnit()
    {
        $this->usedUnits = $this->usedUnits + 1;
        $this->push();
    }

    public function left()
    {
        return $this->total - $this->usedUnits;
    }

}
