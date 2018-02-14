<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{

    //Get
    public function index(Post $post)
    {
        $posts = $post->index();
        return view('home', compact('posts'));
    }

    //Create
    public function create()
    {
        return view('posts.create');
    }

    //Store
    public function store(Request $request, Post $post)
    {
        $post->store($request);
        Session::flash('post_saved', __('postCreate.Post has been saved successful!'));
        return redirect()->route('user.posts');
    }

    //Delete
    public function delete(Post $post)
    {
        if($post->delete_post())
        {
            Session::flash('post_deleted', __('postCreate.Post has been deleted successful!'));
            return redirect()->back();
        }
    }

    //Edit
    public function edit(Request $request, Post $post)
    {
        $post = $post->edit_post($request);
        return view('posts.edit', compact('post'));
    }

    //Update
    public function update(Request $request, Post $post)
    {
        $post->update_post($request);
        Session::flash('post_updated', __('postCreate.Post has been updated successful!'));
        return redirect()->route('user.posts');
    }

    //Single
    public function single_post(Request $request, Post $post)
    {
        $post = $post->single_post($request);
        if ($post->user_id !== Auth::id() && $post->status === 'no-published') {
            abort('404');
        }
        $comments = $post->comments()->orderBy('created_at', 'desc')->paginate(10);
        return view('posts.single', compact(['post', 'comments']));
    }

    //Change status
    public function changeStatus(Request $request, Post $post)
    {
        $post->changeStatus($request);
        Session::flash('change_status', __('postCreate.Status changed!'));
        return redirect()->back();
    }

    //Archive
    public function archive(Request $request, Post $post)
    {
      $posts= $post->archive($request);
      return view('posts.archive', compact('posts'));
    }
}
