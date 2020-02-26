<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['check_in_date',
                            'check_out_date',
                            'room_type',
                            'room_number',
                            'customer_id',
                            'room_status'];

    public function customer() {
        return $this->belongsTo('App/Customer');
    }

    public function room() {
        return $this->belongsTo('App/Room', 'room_number', 'room_number');
    }
}
