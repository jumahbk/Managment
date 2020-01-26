<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{


    public function department()
    {
        return $this->belongsTo('App\Department','department_id', 'id');

    }
    public function branch()
    {
        return $this->belongsTo('App\Branch','branch_id', 'id');

    }


}
