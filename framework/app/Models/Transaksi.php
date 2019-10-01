<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi_barang';
    public $incrementing = false;

    public function createId()
    {
        $date = date('ym');
        $lastRecord = Invoice::orderBy('created_at', 'DESC')->first();
        if($lastRecord->count()>0){
            $lastId = substr($lastRecord->id,6)+1;
        }else{
            $lastId = "001";
        }
        $newId = "TR".$date.substr("00000".$lastId,-4);
        return $newId;
    }
}
