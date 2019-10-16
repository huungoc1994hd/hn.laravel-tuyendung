<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Http\Models\Media::observe(\App\Observers\MediaObserver::class);
        \App\Http\Models\Category::observe(\App\Observers\CategoryObserver::class);
        \App\Http\Models\Posts::observe(\App\Observers\PostsObserver::class);
        \App\Http\Models\Option::observe(\App\Observers\OptionObserver::class);
        \App\Http\Models\Phone::observe(\App\Observers\PhoneObserver::class);
        \App\Http\Models\User::observe(\App\Observers\UserObserver::class);
    }
}
