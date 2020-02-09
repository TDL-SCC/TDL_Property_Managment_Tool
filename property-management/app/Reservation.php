<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['check_in_date',
                            'check_out_date',
                            'room_type',
                            'room_number'];

    public function customer() {
        return $this->belongsTo('App/Customer');
    }
}
