<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class DailyLog extends Model
{
    //
    protected $table = 'app_daily_logs';
    protected $fillable = [
        'title',
        'private_author',
        'public_author',
        'cre_date',
        'ordering',
        'status',
        'content',
        'created_at',
        'updated_at'
    ];
    public function getAuthor(){
        return $this->belongsTo('App\User', 'public_author','name');
    }
}
