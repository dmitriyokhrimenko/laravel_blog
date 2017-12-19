<?php
/**
 * Created by PhpStorm.
 * User: d.okhrimenko
 * Date: 14.11.2017
 * Time: 9:23
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Controllers\PostController;
use App\Http\Repository\ProfileRepository;


class ProfileComposer
{
    protected $posts;

    public function __construct(ProfileRepository $data)
    {
        $this->posts = $data->getData();
    }

    public function compose(View $view)
    {
        $view->with('user', $this->posts);
    }
}