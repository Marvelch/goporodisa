<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jualanku extends Model
{
    protected $table = 'jualankus';

    protected $fillable = [
        'nama_barang',
        'gmbr_depan',
        'gmbr_kiri',
        'gmbr_kanan',
        'gmbr_belakang',
        'id_kategori',
        'harga',
        'id_seller',
        'status',
        'id_lokasi',
        'kondisi',
        'jumlah',
        'berat',
        'merek',
        'deskripsi',
    ];

    public function Tokos()
    {
        return $this->belongsto('App\Toko','id_seller');
    }

    public function Lokasis()
    {
        return $this->belongsto('App\Lokasi','id_lokasi');
    }
}
