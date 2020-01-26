<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    public function departments()
    {
        return $this->hasMany('App\Department');
    }

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
