<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
