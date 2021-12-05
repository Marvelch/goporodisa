<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamats';

    protected $fillable = [
        'id_lokasi',
        'id_user',
        'alamat',
    ];

    public function Lokasis() 
    {
        return $this->belongsto('App\Lokasi','id_lokasi'); 
    }
}
