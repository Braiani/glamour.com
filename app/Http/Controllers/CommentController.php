<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Post;
use App\Comment;

class CommentController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $post_id = Post::where('slug', $request->path())->firstOrFail();
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $request->merge(['post_id' => $post_id->id]);

        Comment::create($request->all());
        toastr()->success('Comentário salvo com sucesso! Obrigado por comentar.', 'Sucesso!');

        return redirect()->route('post', $request->path());
    }
}
