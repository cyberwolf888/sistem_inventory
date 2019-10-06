<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarDetail extends Model
{
    protected $table = 'barang_keluar_detail';

    public function barang_keluar()
    {
        return $this->belongsTo( 'App\Models\BarangKeluar','id_barang_keluar');
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
