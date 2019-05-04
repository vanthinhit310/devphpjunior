<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(array $array)
 */
class Article extends Model
{
    //
    protected $table = 'articles';
    protected $fillable = ['title', 'body', 'tags'];

}
