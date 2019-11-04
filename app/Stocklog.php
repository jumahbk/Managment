<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocklog extends Model
{
    public function Stocklogs()
    {
        return $this->belongsTo('App\Stock','stock_id', 'id');
    }
}
