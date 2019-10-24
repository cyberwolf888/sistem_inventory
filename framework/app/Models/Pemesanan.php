<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
