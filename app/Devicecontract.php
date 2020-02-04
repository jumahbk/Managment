<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devicecontract extends Model
{
    public function Device()
    {
        return $this->belongsTo('App\Device','device_id', 'id');

    }
}
