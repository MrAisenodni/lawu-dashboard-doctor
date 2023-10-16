<?php

namespace App\Providers;

use App\Models\Settings\MainMenu;
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
        view()->composer('layouts.navbar', function($view) {
            $data = [
                'main_menus'        => MainMenu::select('id', 'title', 'icon', 'url', 'is_parent', 'is_login', 'is_shown')->where('disabled', 0)->where('is_shown', 1)->orderBy('order_no')->get(),
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
