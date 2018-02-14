<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, Comment $comment)
    {
        $comment->create_comment($request);
        return back();
    }

    public function delete(Request $request, Comment $comment)
    {
        $comment->delete_comment($request);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $comment = Comment::find($request->id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update_comment($request);
        return redirect()->route('user.comments');
    }
}
