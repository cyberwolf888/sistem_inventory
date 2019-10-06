<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
