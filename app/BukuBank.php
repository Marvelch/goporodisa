<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuBank extends Model
{
    protected $table = 'buku_banks';

    protected $fillable = [
        'id_users',
        'nama_lengkap',
        'nomor_rekening',
        'id_bank',
    ];

    public function Banks()
    {
        return $this->belongsto('App\Bank','id_bank');
    }
}
