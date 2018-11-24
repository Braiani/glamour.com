<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Cache;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->withCount('comments')->paginate(4);
        return view('welcome')->with(['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->withCount('comments')->firstOrFail();

        if (Cache::has($post->id) == false) {
            Cache::add($post->id, 'contador', 5);
            $post->visualizacoes += 1;
            $post->save();
        }

        return view('single-post') ->with(['post' => $post]);
    }

    public function showCategory($slug)
    {
        $category = Category::select('id')->where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)->paginate(6);
        return view('welcome')->with(['posts' => $posts]);
    }

    public function showAutor($id)
    {
        $posts = Post::where('author_id', $id)->paginate(6);
        return view('welcome')->with(['posts' => $posts]);
    }

    public function showAbout()
    {
        return view('about');
    }

    public function showSearch(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('excerpt', 'LIKE', '%' . $request->search . '%')
                ->orWhere('body', 'LIKE', '%' . $request->search . '%')
                ->paginate(4);
        return view('welcome')->with(['posts' => $posts]);
    }
}
