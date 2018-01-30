<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

class MainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->sort == 'desc')
        {
            $posts = Post::orderby('created_at', 'desc')->paginate(5);
            $posts->appends(['sort' => 'desc'])->links();
        }
        else
            $posts = Post::paginate(5);

            if ($request->user()) {
                $user = $request->user()->name;
                $url = route('userposts', ['id' => $request->user()->id]);
            } else {
                $user = 'Not register';
                $url = '/';
            }

        return view('home')->with(['user' => $user, 'url' => $url, 'posts' => $posts]);
    }
}
