<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index() {
        $posts = Post::where('user_id', auth()->user()->id)->paginate();

        return view('post.index', compact('posts'));
    }

    public function createIndex() {
        
        return view('post.create-post');
    }
}
