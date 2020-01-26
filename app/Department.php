<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id', 'id');

    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch','branch_id', 'id');

    }
}
