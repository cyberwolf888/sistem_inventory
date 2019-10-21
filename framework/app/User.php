<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['link_edit'];

    public function getStatus()
    {
        return $this->isActive == 1 ? 'Active' : 'Suspend';
    }

    public function getLabelStatusAttribute($value)
    {
        $status = $this->isActive == 1 ? 'Aktif' : 'Tidak Aktif';

        return $status;

    }

    public function getLinkEditAttribute()
    {
        return route('backend.user.edit',['id'=>$this->id]);

    }
}
