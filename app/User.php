<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'surname',
        'nichname',
        'city',
        'country',
        'age',
        'telephone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //Share user profile
    public function index($request)
    {
        return $this->find($request->id);

    }

    //Delete user
    public function delete_user()
    {
        $user = $this->find(Auth::user()->id);
        Auth::logout();
        return $user->delete();
    }

    //Update user
    public function update_user($request)
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

        return $this->find(Auth::user()->id)->update($user_data);
    }

    //Get all users(admin)
    public function getAllUsers()
    {
        return $this->all();
    }

    //Delete user(admin)
    public function adminDeleteUser()
    {
        return $this->find(request('id'))->delete();
    }
}
