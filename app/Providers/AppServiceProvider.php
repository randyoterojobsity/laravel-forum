<?php

namespace App\Providers;

use App\Channel;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function ($view) {

            $channels = \Cache::rememberForever('channels', function () {
                return Channel::with('threads')->latest()->orderBy('name')->get();
            });

            $view->with('channels', $channels);

            $users = \Cache::rememberForever('users', function () {
                return User::with('threads')->latest()->orderBy('name')->get();
            });

            $view->with('users', $users);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
