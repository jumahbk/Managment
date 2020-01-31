<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department','department_id', 'id');

    }
    public function vendor()
    {
        return $this->belongsTo('App\Vendor','vendor_id', 'id');

    }
    public function room()
    {
        return $this->belongsTo('App\Room','room_id', 'id');

    }

    public function getExpiry()
    {

        $now = time();
        $date = $this->warranty;

        if (strtotime($date) > $now) {
            return  $date;
        } else {
            return 'Expired';
        }
    }

}
