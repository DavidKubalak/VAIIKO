<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use App\Models\Idea;
use App\Models\User;
use App\Policies\IdeaPolicy;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::policy(Idea::class, IdeaPolicy::class);

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        View::composer('*', function ($view) {
            $topUsers = User::withCount(['ideas', 'comments'])
                ->orderByDesc('ideas_count')
                ->orderByDesc('comments_count')
                ->limit(5)
                ->get();

            $view->with('topUsers', $topUsers);
        });
    }

    protected $policies = [
        \App\Models\Idea::class => \App\Policies\IdeaPolicy::class,
        \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];
}
