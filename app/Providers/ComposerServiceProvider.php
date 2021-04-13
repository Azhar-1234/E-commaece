<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'frontend.layouts.header',
            'App\Http\View\Composers\MenuComposer'
        ); 
        view()->composer(
            'frontend.layouts.footer',
            'App\Http\View\Composers\MenuComposer'
        );
    }
}
