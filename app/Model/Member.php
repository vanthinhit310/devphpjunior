<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    //
    use Notifiable;
    const ACTIVE = 1;
    const INACTIVE = 0;
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'token',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
