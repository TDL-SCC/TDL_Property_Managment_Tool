<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $primaryKey = 'room_type';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public function room() {
        return $this->belongsTo('App/Room', 'room_type', 'room_type');
    }
}
