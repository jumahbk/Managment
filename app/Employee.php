<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company','company_id', 'id');
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
