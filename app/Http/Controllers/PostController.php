<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class PostController extends Controller
{

    public function index(Request $request)
    {
        if ($request->sort == 'desc')
        {
            $posts = Post::orderby('created_at', 'desc')->paginate(6);
            $posts->appends(['sort' => 'desc'])->links();
        }
        else
            $posts = Post::paginate(6);
        return view('home', compact('posts'));
    }

    public function create()
    {
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
        else $thumbnail = null;

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

        File::deleteDirectory(public_path('/postImages/' . $post->id));

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
            $request->file('thumbnail')->move(public_path() . '/images/thumbnails', $request->file('thumbnail')->getClientOriginalName());
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

    public function single_post(Request $request)
    {
        $post = Post::find($request->id);
        if ($post->user_id !== Auth::id() && $post->status === 'no-published') {
            abort('404');
        }
        $comments = $post->comments()->orderBy('created_at', 'desc')->paginate(10);
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

    public function archive(Request $request)
    {
        $posts = Post::where('status', 'published')
        ->whereYear('created_at', $request->year)
        ->whereMonth('created_at', Carbon::parse($request->month)->month)
        ->paginate(6);
        return view('posts.archive', compact('posts'));
    }
}
