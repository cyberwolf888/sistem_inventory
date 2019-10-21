<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'retur';
    public $incrementing = false;

    protected $appends = ['link_detail'];

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
}
