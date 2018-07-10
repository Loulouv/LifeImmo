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
        'pack', 'price', 'state', 
    ];

    protected $attributes = array(
        // 0 : propriétée en préparation
        'state' => 0
    );

    public function user() {
        //return $this->belongsTo('app\User');
        return $this->belongsTo(User::class);
        
    }
    public function property() {
        return $this->belongsTo(Property::class);
        //return $this->belongsTo('App\Property');
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

}
