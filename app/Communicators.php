<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communicators extends Model
{
    public function communications()
    {
        return $this->hasMany('App\Communication');
    }
}
