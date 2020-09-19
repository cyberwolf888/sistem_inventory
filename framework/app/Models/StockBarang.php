<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StockBarang
 *
 * @property int $id
 * @property int|null $id_barang
 * @property string|null $serial_number
 * @property string|null $receive_date
 * @property string|null $location
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\BarangKeluarDetail|null $barang_keluar_detail
 * @property-read mixed $link_edit
 * @property-read mixed $nama_barang
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereReceiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockBarang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
