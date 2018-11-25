<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');

        $post->save();

        return redirect('posts');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }
}
