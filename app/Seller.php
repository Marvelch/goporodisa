<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $table = "sellers";

    protected $fillable = [
        'id','name', 'email', 'password', 'phone', 'otp',
    ];

}
