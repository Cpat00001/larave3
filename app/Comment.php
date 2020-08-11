<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    //create relationship to BlogPost
    public function blogPost()
    {
        return $this->belongsTo('App\BlogPost');
    }
}
