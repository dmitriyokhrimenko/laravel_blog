<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Post extends Model
{
    //protected $fillable = ['title', 'body', 'user_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //Get posts
    public function index()
    {
        return $this->where('status', 'published')->paginate(6);
    }

    //Store post
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:50',
            'preview' => 'required|max:150',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator;
        }
        //Check publish or unpublish post status
        if(isset($request->savepublish)){
            $status = 'published';
        }
        elseif (isset($request->save)) {
            $status = 'no-published';
        }

        //Check if isset or not post thumbnail
        if($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path() . '/images/thumbnails', $request->file('thumbnail')->getClientOriginalName());
        }
        else $thumbnail = null;

        $this->create([
            'title' => $request->title,
            'preview' => $request->preview,
            'body' => $request->body,
            'thumbnail' => $thumbnail,
            'user_id' => Auth::id(),
            'status' => $status,
        ]);
    }

    //Change status
    public function changeStatus(Request $request)
    {
        $post = $this->where('id', $request->id)->first();

        if($post->status == 'published'){
            $status = 'no-published';
        }
        else if($post->status == 'no-published'){
            $status = 'published';
        }
        $post->update(['status' => $status]);
    }

    //Delete post
    public function delete_post()
    {
        if(isset(request()->group_delete)){
            return $this->destroy(request()->group_delete);
        }
        else return $this->find(request()->id)->delete();
    }

    //Edit post
    public function edit_post(Request $request)
    {
        return $this->find($request->id);
    }

    //Update post
    public function update_post(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:50',
            'preview' => 'required|max:200',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $validator;
        }

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
        $post = $this->find($request->id);
        $post->update($post_data);
    }

    //Single post
    public function single_post(Request $request)
    {
        return $this->find($request->id);
    }

    public function archive(Request $request)
    {
      return $this->where('status', 'published')
      ->whereYear('created_at', $request->year)
      ->whereMonth('created_at', Carbon::parse($request->month)->month)
      ->paginate(6);
    }

    public function getAllPosts()
    {
        return $this->all();
    }

    public function adminDeletePost()
    {
        return $this->find(request('id'))->delete();
    }
}
