<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        Comment::create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $comment = Comment::find($request->id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->update([
            'body' => $request->body,
        ]);
        return redirect()->route('user.comments');
    }
}
