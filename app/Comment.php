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

    public function getAllComments()
    {
        return $this->paginate(10);
    }

    public function adminDeleteComment()
    {
        return $this->find(request('id'))->delete();
    }
}
