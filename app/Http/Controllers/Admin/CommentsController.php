<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(Request $request)
    {
        $comment = Comment::with(['user','project','images'])->orderBy('id','desc')->get();
        return view('admin.comments.index',compact('comment'));
    }
    public function delete(Comment $comment)
    {
        $comment->images()->delete();
        $comment->delete();
        return back();
    }
}
