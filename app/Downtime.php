<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Downtime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'begin', 'end',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
