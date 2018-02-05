<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function create()
    {
        dd($_SERVER['DOCUMENT_ROOT']);
        return view('posts.create');
    }

    public function store(Request $request)
    {

        if(isset($request->savepublish)){
            $status = 'published';
        }
        elseif (isset($request->save)) {
            $status = 'no-published';
        }
        
        if($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path() . '/images/thumbnails', $request->file('thumbnail')->getClientOriginalName());
        }
        else $thumbnail = '';
                
        Post::create([
            'title' => $request->title,
            'preview' => $request->preview,
            'body' => $request->body,
            'thumbnail' => $thumbnail,
            'user_id' => Auth::id(),
            'status' => $status,
        ]);
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $post = Post::find($request->id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request)
    {
        if(isset($request->thumbnail)){
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path() . '/images/profilePhoto', $request->file('thumbnail')->getClientOriginalName());
            $post_data = 
            [
                'title' => $request->title,
                'preview' => $request->preview,
                'body' => $request->body,
                'thumbnail' => $thumbnail,
            ];
        }else{
            $post_data = 
            [
                'title' => $request->title,
                'preview' => $request->preview,
                'body' => $request->body,
            ];
        }
        $post = Post::find($request->id);
        $post->update($post_data);
        return redirect()->route('single.post', ['id' => $request->id]);
    }

    // public function users_posts(Request $request)
    // {
    //     $user = User::find($request->id);
    //     $posts = $user->posts;
    //     return view('posts.users_posts', compact('posts'));
    // }

    public function single_post(Request $request)
    {
        $post = Post::find($request->id);
        $comments = $post->comments;
        return view('posts.single', compact(['post', 'comments']));
    }
    
    public function changeStatus(Request $request)
    {
        $post = Post::where('id', $request->id)->first();

        if($post->status == 'published'){
            $status = 'no-published';
        }
        else if($post->status == 'no-published'){
            $status = 'published';
        }
        $post->update(['status' => $status]);
        return redirect()->back();
    }
   
}
