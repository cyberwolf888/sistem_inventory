<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $appends = ['link_edit','nama_sku'];

    public function vendor()
	{
		return $this->belongsTo( 'App\Models\Vendor','id_vendor');
    }

    public function category()
	{
		return $this->belongsTo( 'App\Models\Category','id_category');
    }

    public function detail()
    {
        return $this->hasMany( 'App\Models\DetailBarang','id_barang');
    }

    public function getLinkEditAttribute()
	{
		return route('backend.barang.data.edit',['id'=>$this->id]);

    }

    public function getNamaSkuAttribute()
    {
        return $this->name.' - '.$this->sku;
    }
}
