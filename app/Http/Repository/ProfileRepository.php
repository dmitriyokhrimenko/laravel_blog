<?php

namespace App\Http\Repository;
/**
 * Movie Repository class
 */
use App\Post;
use App\User;
use Illuminate\Http\Request;

class ProfileRepository
{
    /**
     * Get a list of all movies
     *
     * @return array  Array containing list of all movies
     */
    public function getData()
    {
        return User::find(request()->id);
    }
}