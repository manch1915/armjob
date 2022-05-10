<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::all();
        return view('admin.main.post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $image = $request->body;
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $image, $image);
        if (isset($image['src'])) {
            $image = $image['src'];
        } else {
            $image = 'null';
        }


        $tags = $request->tags;
        $tags = array_unique(explode(' ', $tags));
        $tags = implode(' ', $tags);

        $post = new post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->general_image = $image;
        $post->breaking = $request->breaking;
        $post->tags = $tags;

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
        $tags = Tag::all();
        return view('admin.main.post.edit', compact('post','tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $image = $request->body;
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $image, $image);
        if(isset($image['src'])){
            $image = $image['src'];
        }else{
            $image = 'none';
        }

        if($request->breaking == null){
            $request->breaking = 0;
        }

        $tags = $request->tags;
        $tags = substr($tags, 0, -1);
        $tags = array_unique(explode(' ', $tags));
        $tags = implode(' ', $tags);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->general_image = $image;
        $post->breaking = $request->breaking;
        $post->tags = $tags;
        $post->save();
        return redirect()->route('posts.index')
            ->with('success','Company Has Been updated successfully');
    }

    public function upload(Request $request){
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $url = asset('images/'.$input['imagename']);
        $data = array('location'=>$url);
        return response()->json($data);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Company has been deleted successfully');
    }
}
