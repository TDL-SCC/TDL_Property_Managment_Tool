<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['checkInDate', 'checkOutDate', 'roomType', 'roomNumber'];

    public function customer() {
        return $this->belongsTo('App/Customer');
    }
}
