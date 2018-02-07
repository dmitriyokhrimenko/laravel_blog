<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Repository\ArchiveRepository;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->composer(
           '*',
           'App\Http\ViewComposers\ProfileComposer'
       );
       view()->composer(
           '*',
           'App\Http\ViewComposers\PostComposer'
       );
       view()->composer('layouts.parts.sidebar', function($view){
          $view->with('archive', ArchiveRepository::getData());
       });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
