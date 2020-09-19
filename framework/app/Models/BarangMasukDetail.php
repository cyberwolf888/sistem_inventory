<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangMasukDetail
 *
 * @property int $id
 * @property string|null $id_barang_masuk
 * @property int|null $id_barang
 * @property int|null $id_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\BarangMasuk|null $barang_masuk
 * @property-read \App\Models\StockBarang|null $stock
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereIdBarangMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereIdStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasukDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
