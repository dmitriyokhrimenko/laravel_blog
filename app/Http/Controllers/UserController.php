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

    //Share user profile
    public function index(Request $request, User $user)
    {
        $user = $user->index($request);
        if(Auth::check()){
            if($user->id == Auth::user()->id){
                return redirect(route('profile'));
            }
        }
        return view('users.index', compact('user'));
    }

    //User profile
    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('users.profile', compact(['user']));
    }

    //Delete user
    public function delete(User $user)
    {
        $user->delete_user();
        return redirect()->home();
    }

    //Delete photo ajax
    public function deletePhoto(User $user)
    {
        $user = User::find(Auth::id());
        //File::deleteDirectory(public_path('/postImages/' . $post->id));
        $user->update(['photo' => null]);
        return response()->json(['response' => User::find(Auth::id())], 200);
    }

    //Edit user
    public function edit()
    {

        $user = Auth::user();
        return view('users.editProfile', compact('user'));
    }

    //Update user
    public function update(Request $request, User $user)
    {
        $user->update_user($request);
        return redirect()->route('profile');
    }

    public function userPosts()
    {
        $user = $this->repo->getData();
        $posts = $user->posts;
        return view('users.userPosts', compact(['user', 'posts']));
    }

    public function userComments()
    {
        $user = $this->repo->getData();
        $comments = $user->comments;
        return view('users.userComments', compact(['comments']));
    }
}
