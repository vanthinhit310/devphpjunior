<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'app_user_profiles';
    protected $fillable =[
        'user_id',
        'birth_day',
        'phone',
        'address',
        'facebook_link',
        'github_link',
        'created_at',
        'updated_at'
    ];
}
