<?php

namespace App\Providers;

use App\Models\Settings\{
    MainMenu,
    Provider,
};
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Fungsi untuk menampilkan Provider
        view()->composer('layouts.main', function ($view) {
            $view->with(
                'provider', Provider::where('disabled', 0)->first(),
            );
        });

        // Fungsi untuk menampilkan Menu pada Navbar
        view()->composer('layouts.navbar', function($view) {
            $data = [
                'main_menus'        => MainMenu::select('id', 'title', 'icon', 'url', 'is_parent', 'is_login', 'is_shown')->where('disabled', 0)->where('is_shown', 1)->orderBy('order_no')->get(),
                'provider'          => Provider::select('id', 'provider_name', 'provider_logo', 'provider_picture')->where('disabled', 0)->first(),
            ];
            
            $view->with($data);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
