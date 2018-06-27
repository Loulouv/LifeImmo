<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'disponibility', 
    ];

    public function users() {
        return $this->belongsTo('app\User');
    }

    public function properties() {
        return $this->belongsTo('app\Property');
    }
}
