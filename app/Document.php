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

    public function users() {
        return $this->belongsTo('app\User');
    }
}
