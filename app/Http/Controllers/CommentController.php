<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::where('post_id', $request->id)->get();
        return view('posts.single', compact('comments'));
    }

    public function create(Request $request)
    {
        //dd(\request());
        if($request->user())
        {
            $user_id = $request->user()->id;
            $post_id = Post::find($request->id)->id;
        }
        //dd($post_id);
        Comment::create([
            'body' => $request->body,
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
        //dd(request()->all());
        return back();
    }
}
