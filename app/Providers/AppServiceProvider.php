<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        $cat_menu = Category::latest()->take(5)->get();
        view()->share('cat_menu', $cat_menu);
        $setting = Setting::first();
        view()->share('setting', $setting);
    }
}
