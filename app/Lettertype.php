<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lettertype extends Model
{
    public function communications()
    {
        return $this->hasMany('App\Communication');
    }
}
