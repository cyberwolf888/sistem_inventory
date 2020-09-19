<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BarangKeluar
 *
 * @property string $id
 * @property int|null $id_supplier
 * @property string|null $transaction_date
 * @property int|null $total
 * @property string|null $description
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BarangKeluarDetail[] $detail
 * @property-read int|null $detail_count
 * @property-read mixed $link_detail
 * @property-read \App\Models\Pemesanan|null $pemesanan
 * @property-read \App\User|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereIdSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKeluar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    public $incrementing = false;

    protected $appends = ['link_detail'];

    public function createID()
    {
        $count = $this->count();
        if($count > 0){
            $last_id = ($this->orderBy('created_at','DESC')->first())->id;
            return 'BK'.date( 'Ymd').substr( '00000'.((int)substr( $last_id, -5) + 1), -5);
        }else{
            return 'BK'.date( 'Ymd').'00001';
        }
    }

    public function detail()
    {
        return $this->hasMany( 'App\Models\BarangKeluarDetail','id_barang_keluar');
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\User','id_supplier');
    }

    public function pemesanan()
    {
        return $this->hasOne( 'App\Models\Pemesanan', 'id_barang_keluar');
    }

    public function getLinkDetailAttribute()
    {
        return route('backend.barang_keluar.detail',['id'=>$this->id]);

    }
}
