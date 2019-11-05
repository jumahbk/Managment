<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocklog extends Model
{
    public function stock()
    {
        return $this->belongsTo('App\Stock','stock_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee','employee_id', 'id');
    }
}
