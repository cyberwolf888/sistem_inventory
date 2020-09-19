<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangKeluarDetail
 *
 * @property int $id
 * @property string|null $id_barang_keluar
 * @property int|null $id_barang
 * @property int|null $id_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\BarangKeluar|null $barang_keluar
 * @property-read \App\Models\StockBarang|null $stock
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereIdBarangKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereIdStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluarDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
