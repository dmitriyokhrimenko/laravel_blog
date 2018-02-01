<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Post;
use App\Comment;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $filename = $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->move(public_path() . '/images/thumbnails', $request->file('thumbnail')->getClientOriginalName());
        
        Post::create([
            'title' => $request->title,
            'preview' => $request->preview,
            'body' => $request->body,
            'thumbnail' => $filename,
            'user_id' => $user_id,
        ]);
        return redirect('/');
    }

    public function users_posts(Request $request)
    {
        $user = User::find($request->id);
        $posts = $user->posts;
        return view('posts.users_posts', compact('posts'));
    }

    public function single_post(Request $request)
    {
        $post = Post::find($request->id);
        $comments = $post->comments;
        return view('posts.single', compact(['post', 'comments']));
    }
}
