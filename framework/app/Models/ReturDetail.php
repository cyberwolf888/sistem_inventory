<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReturDetail
 *
 * @property int $id
 * @property string|null $id_retur
 * @property int|null $id_stock
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Retur|null $retur
 * @property-read \App\Models\StockBarang|null $stock
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail whereIdRetur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail whereIdStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReturDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReturDetail extends Model
{
    protected $table = 'retur_detail';

    public function retur()
    {
        return $this->belongsTo( 'App\Models\Retur','id_retur');
    }

    public function stock()
    {
        return $this->belongsTo( 'App\Models\StockBarang', 'id_stock');
    }
}
