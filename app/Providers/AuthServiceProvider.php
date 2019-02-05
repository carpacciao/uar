<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User'  => 'App\Policies\UserPolicy',
        'App\Article'  => 'App\Policies\ArticlePolicy',
        'App\Profile'  => 'App\Policies\ProfilePolicy',
    ];  

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return Auth::user()->role->name === 'admin';
        });
        Gate::define('editor', function ($user) {
            return Auth::user()->role->name === 'editor';
        });
        Gate::define('guest', function ($user) {
            return Auth::user()->role->name === 'guest';
        });
    }
}
