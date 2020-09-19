<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Barang
 *
 * @property int $id
 * @property int|null $id_category
 * @property int|null $id_vendor
 * @property string|null $name
 * @property string|null $sku
 * @property int|null $price
 * @property int|null $warranty
 * @property string|null $image
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailBarang[] $detail
 * @property-read int|null $detail_count
 * @property-read mixed $link_edit
 * @property-read mixed $nama_sku
 * @property-read \App\Models\Vendor|null $vendor
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereIdVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereWarranty($value)
 * @mixin \Eloquent
 */
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
