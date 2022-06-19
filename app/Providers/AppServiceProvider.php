<?php

namespace App\Providers;

use App\Enums\Role;
use Blade;
use Illuminate\Support\ServiceProvider;
use Log;

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
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role->is(Role::ADMIN);
        });

        Blade::if('role', function (...$roles) {
            return auth()->check() && auth()->user()->role->in($roles);
        });
    }
}
