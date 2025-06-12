<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SiteVisit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

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
        view()->share('posts', Post::all());
        view()->share('logo', Setting::first());
        view()->share('comment', Comment::all());
        view()->share('totalPosts', Post::count());
        view()->share('totalcomments', Comment::count());


        if (!Session::has('site_visited')) {
            Session::put('site_visited', true);

            $visit = SiteVisit::first();
            if (!$visit) {
                SiteVisit::create(['count' => 1]);
            } else {
                $visit->increment('count');
            }
        }
    }
}
