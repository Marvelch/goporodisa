<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'Tokos';

    protected $filable = [
        'id_seller',
        'id_lokasi',
        'nama_toko',
        'alamat',
    ];
}
