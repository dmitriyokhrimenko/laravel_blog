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

    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('users.profile', compact(['user']));
    }
    
    public function delete()
    {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        $user->delete();
        return redirect()->home();
    }
    
    public function edit()
    {

        $user = Auth::user();
        return view('users.editProfile', compact('user'));
    }

    public function update(Request $request)
    {
        if(isset($request->photo)){
            $userPhoto = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path() . '/images/profilePhoto', $request->file('photo')->getClientOriginalName());
            $user_data = 
            [
                "photo" => $userPhoto,
                "name" => $request->name,
                "surname" => $request->surname,
                "nickname" => $request->nackname,
                "city" => $request->city,
                "country" => $request->country,
                "age" => $request->age,
                "email" => $request->email,
                "telephone" => $request->telephone,
            ];
        }
        else{

            $user_data = 
            [
                "name" => $request->name,
                "surname" => $request->surname,
                "nickname" => $request->nackname,
                "city" => $request->city,
                "country" => $request->country,
                "age" => $request->age,
                "email" => $request->email,
                "telephone" => $request->telephone,
            ];
        }
        
        $user = User::find(Auth::user()->id);
        $user->update($user_data);
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
