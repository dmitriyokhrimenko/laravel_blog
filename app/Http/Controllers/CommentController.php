<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        
        if(Auth::check())
        {
            $user_id = $request->user()->id;
            $post_id = Post::find($request->id)->id;
        }
        Comment::create([
            'body' => $request->body,
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
        return back();
    }
}
