<?php

namespace App\Http\Repository;
/**
 * Movie Repository class
 */
use App\Post;
use Illuminate\Http\Request;

class PostRepository
{
    /**
     * Get a list of all movies
     *
     * @return array  Array containing list of all movies
     */
    public function getData()
    {
        return Post::find(request()->id);
    }
}