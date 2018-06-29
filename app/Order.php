<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pack', 'state', 
    ];

    protected $attributes = array(
        // 0 : propriétée en préparation
        'state' => 0
    );

    public function users() {
        return $this->belongsTo('app\User');
    }
    public function properties() {
        return $this->belongsTo('app\Property');
    }

    public function options() {
        return $this->hasMany('app\Option');
    }

}
