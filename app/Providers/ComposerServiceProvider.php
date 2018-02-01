<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer(
//            '*',
//            'App\Http\ViewComposers\ProfileComposer'
//        );
//        view()->composer(
//            '*',
//            'App\Http\ViewComposers\PostComposer'
//        );
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
