<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Company','company_id', 'id');
    }
    public function department()
    {
        return $this->hasOne('App\Department');
    }
    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }


    public function title()
    {
        return $this->belongsTo('App\Title', 'title_id', 'id');
    }


    public function data()
    {
        return $this->hasMany('App\Data');
    }

    public function stocklogs()
    {
        return $this->hasMany('App\Stocklog');
    }
}
