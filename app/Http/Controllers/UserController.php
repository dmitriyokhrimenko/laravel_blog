<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProfileRepository;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $repo;

    public function __construct(ProfileRepository $repository)
    {
        $this->repo = $repository;
    }

    public function index(Request $request)
    {
        $user = User::find($request->id);
        if(Auth::check()){
            if($user->id == Auth::user()->id){
                return redirect(route('profile'));
            }
        }
        return view('users.index', compact('user'));
    }

    public function profile()
    {
        $user = $this->repo->getData();
        $posts = $user->posts;
        return view('users.profile', compact(['user', 'posts']));
    }
}
