<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id', 'id');

    }

    public function company()
    {
        return $this->branch->company;

    }

    public function branch()
    {
        return $this->belongsTo('App\Branch','branch_id', 'id');

    }
}
