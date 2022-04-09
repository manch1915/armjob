<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function view;

class IndexController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->all();
        return view('admin.main.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.main.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $post = new post();
        $post->name = $request->name;
        $post->save();
        return redirect()->route('posts.index')
            ->with('success','Company has been created successfully.');
    }

    public function show(Post $post)
    {
        return view('admin.main.post.show',compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.main.post.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $post = Post::find($id);
        $post->name = $request->name;
        $post->save();
        return redirect()->route('posts.index')
            ->with('success','Company Has Been updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Company has been deleted successfully');
    }
}
