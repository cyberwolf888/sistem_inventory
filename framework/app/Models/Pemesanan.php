<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pemesanan
 *
 * @property string $id
 * @property int $id_supplier
 * @property string|null $id_barang_keluar
 * @property string|null $address
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BarangKeluar|null $barang_keluar
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PemesananDetail[] $detail
 * @property-read int|null $detail_count
 * @property-read mixed $link_detail
 * @property-read \App\Models\Pembayaran|null $pembayaran
 * @property-read \App\User $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereIdBarangKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereIdSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemesanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    public $incrementing = false;

    protected $appends = ['link_detail'];

    public function createID()
    {
        $count = $this->count();
        if($count > 0){
            $last_id = ($this->orderBy('created_at','DESC')->first())->id;
            return 'PS'.date( 'Ymd').substr( '00000'.((int)substr( $last_id, -5) + 1), -5);
        }else{
            return 'PS'.date( 'Ymd').'00001';
        }
    }

    public function barang_keluar()
    {
        return $this->belongsTo( 'App\Models\BarangKeluar','id_barang_keluar');
    }

    public function detail()
    {
        return $this->hasMany( 'App\Models\PemesananDetail','id_pemesanan');
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\User','id_supplier');
    }

    public function pembayaran()
    {
        return $this->hasOne( 'App\Models\Pembayaran', 'id_transaksi');
    }
    public function getLinkDetailAttribute()
    {
        return route('supplier.pemesanan.detail',['id'=>$this->id]);

    }
}
