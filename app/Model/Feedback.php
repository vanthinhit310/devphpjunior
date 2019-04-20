<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'phpjunior_feedback';
    protected $fillable = ['name_fb', 'email_fb','phone_fb','subject_fb','message_fb','created_at','updated_at'];
}
