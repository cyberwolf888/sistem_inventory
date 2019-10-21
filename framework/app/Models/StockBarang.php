<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockBarang extends Model
{
    protected $table = 'stock_barang';
    protected $appends = ['link_edit','nama_barang'];

    public function barang()
    {
        return $this->belongsTo( 'App\Models\Barang','id_barang');
    }

    public function barang_keluar_detail()
    {
        return $this->hasOne( 'App\Models\BarangKeluarDetail','id_barang');
    }

    public function getLinkEditAttribute()
    {
        return route('backend.barang.stock.edit',['id'=>$this->id]);

    }

    public function getNamaBarangAttribute()
    {
        return $this->serial_number.' - '.$this->barang->name;
    }
}
