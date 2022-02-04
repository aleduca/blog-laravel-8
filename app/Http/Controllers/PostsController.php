<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','comments'])->paginate(15);

        // dd($posts);

        return view('posts', ['title' => 'Posts','posts' => $posts]);
    }
}
