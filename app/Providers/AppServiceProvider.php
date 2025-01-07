<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Idea;
use App\Policies\IdeaPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Gate::policy(Idea::class, IdeaPolicy::class);
    }

    protected $policies = [
        \App\Models\Idea::class => \App\Policies\IdeaPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];

}

