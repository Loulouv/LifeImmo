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
        'date', 'disponibility', 'real_date', 'state',
    ];

    protected $attributes = array(
        // 0 : demande non vue par le conseiller
        'state' => 0
    );

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function properties() {
        return $this->belongsTo(Property::class);
    }
    public $timestamps = false;
}
