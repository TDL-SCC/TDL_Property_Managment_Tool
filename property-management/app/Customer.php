<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name',
                            'last_name',
                            'middle_initial',
                            'phone',
                            'phone_secondary',
                            'email',
                            'date_of_birth'];

    public function reservation() {
        return $this->hasMany('App/Reservation');
    }
}
