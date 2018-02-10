<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Post;

class PostController extends Controller
{
  public function index(Post $post)
  {
      $posts = $post->getAllPosts();
      return view('admin.allPosts', compact('posts'));
  }

  public function delete(Post $post)
  {
      if($post->adminDeletePost())
      return redirect()->back();
  }
}
