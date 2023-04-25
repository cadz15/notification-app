<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index() {
        $posts = Post::where('user_id', auth()->user()->id)->simplePaginate(25);

        return view('post.index', compact('posts'));
    }

    public function createIndex() {
        
        return view('post.create-post');
    }

    public function store(Request $request) {
        $request->validate([
            'post-title' => 'required',
            'post-body' => 'required'
        ]);

        Post::create([
            'title' => $request['post-tite'],
            'body' => $request['post-body'],
            'user_id' => auth()->user()->id
        ]);

        return redirect('/post')->with('status', 'New Post created!');
    }
}
