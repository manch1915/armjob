<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->all();
        $data = [
            'posts' => $posts,
            'recent_posts' => $posts->take(5)->sortByDesc('created_at'),
        ];
        return view('main.index', compact('data'));
    }
    public function post(Post $post)
    {
        $data = [
            'post' => $post,
        ];
        return view('main.post', compact('data'));
    }
}
