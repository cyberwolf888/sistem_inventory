<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PemesananDetail
 *
 * @property int $id
 * @property string|null $id_pemesanan
 * @property int|null $id_barang
 * @property int|null $price
 * @property int|null $qty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\Pemesanan|null $pemesanan
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereIdPemesanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PemesananDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
