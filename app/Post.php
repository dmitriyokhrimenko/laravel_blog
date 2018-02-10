<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function getAllPosts()
    {
        return $this->all();
    }

    public function adminDeletePost()
    {
        return $this->find(request('id'))->delete();
    }
}
