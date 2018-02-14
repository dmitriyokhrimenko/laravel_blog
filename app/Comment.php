<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function create_comment($request)
    {
        return $this->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
        ]);
    }

    public function delete_comment($request)
    {
        return $this->find($request->id)->delete();
    }

    public function update_comment($request)
    {
        $comment = $this
        ->find($request->id)
        ->update([
            'body' => $request->body,
        ]);
    }

    public function getAllComments()
    {
        return $this->paginate(10);
    }

    public function adminDeleteComment()
    {
        return $this->find(request('id'))->delete();
    }
}
