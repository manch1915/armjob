<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function view;

class IndexController extends Controller
{
    public function index(Comment $comment)
    {
        $data['comments'] = Comment::orderBy('id','desc');
        return view('admin.main.comment.index', $data);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')
            ->with('success','Company has been deleted successfully');
    }
}
