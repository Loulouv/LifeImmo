<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'cp', 'city', 'name', 
        'building', 'floor', 'letterbox', 'location', 
        'type', 'area', 'rooms', 'description', 
        'price', 'furniture', 'energy_class', 'ges', 'state', 
    ];

    protected $attributes = array(
        // 0 : propriétée en préparation
        'state' => 0
    );

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orders() {
        return $this->hasMany('app\Order');
    }

    public function media() {
        return $this->hasMany('app\Media');
    }

    public function visits() {
        return $this->hasMany('app\Visit');
    }

}
