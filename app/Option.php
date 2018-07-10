<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state',
    ];

    protected $attributes = array(
        // 0 : pack non vue par le conseiller
        'state' => 0
    );

    public function order() {
        return $this->belongsTo(Order::class);
    }
    public $timestamps = false;
}
