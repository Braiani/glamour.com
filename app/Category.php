<?php

namespace App;

use TCG\Voyager\Models\Category as VoyagerCategory;

class Category extends VoyagerCategory
{
    public function post()
    {
        return $this->hasOne('App\Post');
    }
}
