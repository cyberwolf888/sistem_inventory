<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pembayaran
 *
 * @property int $id
 * @property string|null $id_transaksi
 * @property string|null $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereIdTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pembayaran extends Model
{
    protected $table = 'pembayaran';
}
