<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['apartment_id', 'fullname', 'email', 'message'];

    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
