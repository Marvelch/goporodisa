<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjangs';

    protected $fillable = [
        'id_user',
        'id_jualanku',
        'jumlah_pesanan',
    ];

    public function Jualankus()
    {
        return $this->belongsto('App\Jualanku','id_jualanku');
    }
}
