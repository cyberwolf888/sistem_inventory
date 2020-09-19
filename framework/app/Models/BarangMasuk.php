<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangMasuk
 *
 * @property int $id
 * @property int|null $id_vendor
 * @property string|null $no_faktur
 * @property string|null $transaction_date
 * @property string|null $description
 * @property int|null $total
 * @property int|null $status 1 => selesai, 2 => proses
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BarangMasukDetail[] $detail
 * @property-read int|null $detail_count
 * @property-read mixed $link_detail
 * @property-read \App\Models\Vendor|null $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereIdVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereNoFaktur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangMasuk whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $appends = ['link_detail'];

    public function vendor()
    {
        return $this->belongsTo( 'App\Models\Vendor','id_vendor');
    }

    public function detail()
    {
        return $this->hasMany( 'App\Models\BarangMasukDetail','id_barang_masuk');
    }

    public function getLinkDetailAttribute()
    {
        return route('backend.barang_masuk.detail',['id'=>$this->id]);

    }
}
