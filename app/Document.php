<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'rname', 'path',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
