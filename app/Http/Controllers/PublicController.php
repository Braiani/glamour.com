<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Cache;

class PublicController extends Controller
{
    /**
     * PublicController constructor.
     */
    public function __construct()
    {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    }


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
        $abouts = About::all();
        return view('about')->with(['abouts' => $abouts]);
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
