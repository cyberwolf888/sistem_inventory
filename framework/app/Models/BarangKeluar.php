<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
