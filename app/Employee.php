<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }


    public function title()
    {
        return $this->belongsTo('App\Title');
    }


    public function data()
    {
        return $this->hasMany('App\Data');
    }
}
