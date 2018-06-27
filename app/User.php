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
        'fname', 'sname', 'email', 'phone', 'password',
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
        return $this->hasMany('app\Document');
    }
    public function downtimes() {
        return $this->hasMany('app\Downtime');
    }
    public function properties() {
        return $this->hasMany('app\Property');
    }
    public function requests() {
        return $this->hasMany('app\Request');
    }

    public function visits() {
        return $this->hasMany('app\Visit');
    }


}
