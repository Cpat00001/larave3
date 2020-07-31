<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //create relationship to BlogPost
    public function blogPost()
    {
        return $this->belongsTo('App\BlogPost');
    }
}
