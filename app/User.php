<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    // use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','celphone','access','image_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function img()
    {
        return $this->hasOne('App\Image','id','image_id');
    }

    public function cards()
    {
        return $this->hasMany('App\Conekta_card','parent_id','token');
    }

    public function orders()
    {
        return $this->hasMany('App\Conekta_order','parent_id','token');
    }
}
