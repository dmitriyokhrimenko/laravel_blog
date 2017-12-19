<?php
/**
 * Created by PhpStorm.
 * User: d.okhrimenko
 * Date: 14.11.2017
 * Time: 9:23
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Repository\PostRepository;


class PostComposer
{
    protected $posts;

    public function __construct(PostRepository $data)
    {
        $this->posts = $data->getData();
    }

    public function compose(View $view)
    {
        $view->with('post', $this->posts);
    }
}