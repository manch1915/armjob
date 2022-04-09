<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use function redirect;
use function view;

class IndexController extends Controller
{
    public function index(Tag $tag)
    {
        $tags = $tag->all();
        return view('admin.main.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.main.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tags.index')
            ->with('success','Company has been created successfully.');
    }

    public function show(Tag $tag)
    {
        return view('admin.main.tag.show',compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.main.tag.edit',compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tags.index')
            ->with('success','Company Has Been updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')
            ->with('success','Company has been deleted successfully');
    }
}
