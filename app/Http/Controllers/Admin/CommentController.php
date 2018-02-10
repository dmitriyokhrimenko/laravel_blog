<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Comment;

class CommentController extends Controller
{
      public function index(Comment $comment)
      {
          $comments = $comment->getAllcomments();
          return view('admin.allComments', compact('comments'));
      }

      public function delete(Comment $comment)
      {
          if($comment->adminDeleteComment())
          return redirect()->back();
      }
}
