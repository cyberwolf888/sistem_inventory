<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Retur
 *
 * @property string $id
 * @property int|null $id_supplier
 * @property string|null $retur_date
 * @property string|null $description
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReturDetail[] $detail
 * @property-read int|null $detail_count
 * @property-read mixed $link_detail
 * @property-read mixed $link_detail_supplier
 * @property-read \App\User|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|Retur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Retur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Retur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereIdSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereReturDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Retur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Retur extends Model
{
    protected $table = 'retur';
    public $incrementing = false;

    protected $appends = ['link_detail','link_detail_supplier'];

    public function createID()
    {
        $count = $this->count();
        if($count > 0){
            $last_id = ($this->orderBy('created_at','DESC')->first())->id;
            return 'RT'.date( 'Ymd').substr( '00000'.((int)substr( $last_id, -5) + 1), -5);
        }else{
            return 'RT'.date( 'Ymd').'00001';
        }
    }

    public function detail()
    {
        return $this->hasMany( 'App\Models\ReturDetail','id_retur');
    }

    public function supplier()
    {
        return $this->belongsTo( 'App\User','id_supplier');
    }

    public function getLinkDetailAttribute()
    {
        return route('backend.retur.detail',['id'=>$this->id]);

    }
    public function getLinkDetailSupplierAttribute()
    {
        return route('supplier.retur.detail',['id'=>$this->id]);

    }
}
