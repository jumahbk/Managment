<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Communication extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\Communication','communicator_id', 'id');

    }

    public function communications()
    {
        return $this->hasMany('App\Communication');
    }


    public function letterType()
    {
        return $this->belongsTo('App\Lettertype','lettertype_id', 'id');

    }

    public function communicators()
    {
        return $this->belongsTo('App\Communicators', 'communicator_id', 'id');
    }

}
