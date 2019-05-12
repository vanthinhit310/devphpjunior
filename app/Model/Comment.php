<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'app_comments';
    protected $fillable = [
        'name',
        'email',
        'company',
        'comment',
        'accept',
        'id_comment_parent',
        'id_post',
        'user_id',
        'data_type',
        'created_at',
        'updated_at'
    ];
    public function getUserComment (){
        return $this->belongsTo('App\User','user_id','id');
    }
}
