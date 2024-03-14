<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

//{
//    $this->middleware('auth')->only('delete', 'update', 'edit');
//        $this->authorizeResource(Post::class,'post');
//}


    public function Views()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }


    public function index(Request $request)
    {
        $query = $request->input('search');
        $posts = Post::query()->where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();
        return view('post.index', compact('posts' ));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->user_id = auth()->user()->id;
        $posts->save();
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $posts = Post::find($id);
        $comments = $posts->comments()->get();
        return view('post.show', compact('posts', 'comments'));
    }


    public function edit(CreateTopik $createTopik)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->save();
        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }


}
