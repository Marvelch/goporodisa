<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasis';

    protected $fillable = [
        'nama_desa',
        'id'
    ];
}
