<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian_Transaksi extends Model
{
    protected $table = 'rincian_transaksis';

    protected $fillable = [
        'id',
        'kode_transaksi',
        'id_jualanku',
        'harga_barang',
        'jumlah_pesanan',
        'berat_barang',
        'id_alamat_pengirim',
        'id_alamat_penerima',
        'id_seller',
        'id_toko',
    ];

    public function transaksi_jualanku()
    {
        return $this->belongsto('App\Jualanku','id_jualanku');
    }
}
