<?php

namespace App\Http\Repository;
/**
 * Movie Repository class
 */
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileRepository
{
    /**
     * Get a list of all movies
     *
     * @return array  Array containing list of all movies
     */
    public function getData()
    {
        if(Auth::check()){
            return User::find(Auth::user()->id);
        }
        return '';
    }
}