<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class AdminController extends Controller
{

    public function posts()
    {
        $posts = Post::all();
        //$posts = 'hello';
        //dd($posts);
        return view('admin.posts')->with(['posts' => $posts]);
    }

    public function delete_post()
    {
        Post::find(request()->id)->delete();
        return redirect()->back();
    }

    public function users()
    {
        $users = User::all();
        //$posts = 'hello';
        //dd($posts);
        return view('admin.users')->with(['users' => $users]);
    }
}
