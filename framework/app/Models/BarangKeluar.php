<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $appends = ['link_detail'];

    public function detail()
    {
        return $this->hasMany( 'App\Models\BarangKeluarDetail','id_barang_keluar');
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\Models\Supplier','id_supplier');
    }

    public function getLinkDetailAttribute()
    {
        return route('backend.barang_masuk.detail',['id'=>$this->id]);

    }
}
