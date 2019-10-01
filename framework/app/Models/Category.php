<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategori';
    protected $appends = ['link_edit'];

    public function getLinkEditAttribute()
	{
		return route('backend.kategori.edit',['id'=>$this->id]);

    }
}
