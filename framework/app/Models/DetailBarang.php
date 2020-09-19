<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DetailBarang
 *
 * @property int $id
 * @property int|null $id_barang
 * @property string|null $option
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereIdBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailBarang whereValue($value)
 * @mixin \Eloquent
 */
class DetailBarang extends Model
{
    protected $table = 'detail_barang';
}
