<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_number';
    public $incrementing = false;
    protected $keyType = 'string';

    public function reservation() {
        return $this->hasMany('App/Reservation', 'room_number', 'room_number');
    }
}
