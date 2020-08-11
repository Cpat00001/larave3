<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;
    protected $table = 'blogposts';
    protected $fillable = ['title', 'content'];
    //create relationship One to Many
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public static function boot()
    {
        parent::boot(); 
        static::deleting(function(BlogPost $blogPost){
            $blogPost->comments()->delete();
            // dd('I was deleted');
        });

        static::restorinf(function(BlogPost $blogPost){
            $blogPost->comments()->restore();
        });
    }
}
