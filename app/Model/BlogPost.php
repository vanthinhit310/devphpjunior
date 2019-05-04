<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class BlogPost extends Model implements ViewableContract
{
    //
    use Viewable;
    protected $table = 'blog_posts';
    protected $fillable = ['title','author','view','theme','description','image','key_work','slug','ordering','content','created_at','updated_at'];

    public function getPostCategory()
    {
        return $this->belongsTo('App\Model\PostCategory','theme','theme');
    }
}
