<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockrole extends Model
{
    public function users()
    {
        return $this->hasMany('App\User','stock_request_role');
    }
}
