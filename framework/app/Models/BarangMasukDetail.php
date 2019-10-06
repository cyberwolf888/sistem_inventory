<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasukDetail extends Model
{
    protected $table = 'barang_masuk_detail';

    public function barang_masuk()
    {
        return $this->belongsTo( 'App\Models\BarangMasuk', 'id_barang_masuk');
    }

    public function barang()
    {
        return $this->belongsTo( 'App\Models\Barang', 'id_barang');
    }

    public function stock()
    {
        return $this->belongsTo( 'App\Models\StockBarang', 'id_stock');
    }
}
