<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananDetail extends Model
{
    protected $table = 'pemesanan_detail';

    public function barang()
    {
        return $this->belongsTo( 'App\Models\Barang', 'id_barang');
    }

    public function pemesanan()
    {
        return $this->belongsTo( 'App\Models\Pemesanan', 'id_pemesanan');
    }
}
