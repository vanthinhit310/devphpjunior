<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    //
    protected $table = 'app_keys';
    protected $fillable = [
        'key',
        'count_search',
        'created_at',
        'updated_at'
    ];
}
