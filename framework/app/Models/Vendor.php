<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    protected $appends = ['link_edit'];

    public function getLinkEditAttribute()
	{
		return route('backend.vendor.edit',['id'=>$this->id]);

    }
}
