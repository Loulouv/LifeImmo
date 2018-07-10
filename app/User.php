<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'fname', 'sname', 'email', 'phone', 'password', 'address', 'cp', 'city',
    ];

    protected $attributes = array(
        'state' => 1
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function documents() {
        return $this->hasMany(Document::class);
    }
    public function downtimes() {
        return $this->hasMany(Downtime::class);
    }
    public function properties() {
        return $this->hasMany(Property::class);
    }
    public function orders() {
        //return $this->hasMany('app\Order');
        return $this->hasMany(Order::class);
    }
    public function options() {
        //return $this->hasMany('app\Order');
        return $this->hasManyThrough(Order::class, Option::class);
    }



    public function visits() {
        return $this->hasMany(Visit::class);
    }


}
