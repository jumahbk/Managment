<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function stocklogs()
    {
        return $this->hasMany('App\Stocklog');
    }

    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    public function role()
    {
        return $this->belongsTo('App\Role','role', 'id');
    }
    public function stockrole()
    {
        return $this->belongsTo('App\Stockrole','stock_request_role', 'id');
    }
}
