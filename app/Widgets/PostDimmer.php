<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\PostDimmer as PostDimmerBase;

class PostDimmer extends PostDimmerBase
{
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', new \App\Post());
    }
}
