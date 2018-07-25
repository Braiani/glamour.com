<?php

namespace App;

use TCG\Voyager\Models\Post as VoyagerPost;

class Post extends VoyagerPost
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
