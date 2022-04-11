<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use function redirect;
use function view;

class IndexController extends Controller
{


    public function index(Tag $tag)
    {
        $data['tags'] = Tag::orderBy('id', 'desc');
        return view('admin.main.index', $data);
    }

}
