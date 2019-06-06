<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    public function country()
    {
        return $this->belongsTo("App\Country", 'country_id');
    }

    public function state()
    {
        return $this->belongsTo("App\State", 'state_id');
    }

    public function city()
    {
        return $this->belongsTo("App\City", 'city_id');
    }
}
