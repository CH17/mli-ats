<?php

namespace App\Providers;

use App\Project;
use Illuminate\Support\ServiceProvider;
use App\Observers\ProjectObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        Project::observe(ProjectObserver::class);


        // view()->composer('backend.partials.notifications', function ($view) {

        //     if (Auth::user()) {
        //         $user = Auth::user();
        //         $notifications = $user->unreadNotifications()->take(5)->get();
        //         $count =  $user->unreadNotifications()->count();
        //     }

        //     $view->with([
        //         'notifications' => $notifications,
        //         'count' => $count
        //     ]);
        // });
    }
}
