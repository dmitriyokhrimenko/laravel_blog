<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class UserController extends Controller
{

    public function index(User $user)
    {
        $users = $user->getAllUsers();
        return view('admin.allUsers', compact('users'));
    }

    public function delete(User $user)
    {
        if($user->adminDeleteUser())
        return redirect()->back();
    }
}
