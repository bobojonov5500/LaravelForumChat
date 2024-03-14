<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
//        $comments=Comment::all();
//        dd($comments);
//        return view('post.show',compact('comments'));

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' =>'required'
        ]);

        $comment = new Comment();
        $comment->content = $request['content'];
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->back();

    }
}
