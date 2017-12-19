<?php

namespace App\Http\Controllers;

use App\Http\Repository\ProfileRepository;
use Illuminate\Http\Request;
use App\User;
use App\Post;

class UserController extends Controller
{

    protected $repo;

    public function __construct(ProfileRepository $repository)
    {
        $this->repo = $repository;
    }

    public function index()
    {
        $user = User::find(request()->id);
        return view('users.index', compact('user'));
    }

    public function profile()
    {
        $user = $this->repo->getData();
        return view('users.profile', compact('user'));
    }
}
