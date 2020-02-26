<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use App\Slider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
        $sliders = Slider::all();
        $products = DB::table('products')->limit(5)->get();
        View::share('products', $products);
        View::share('sliders', $sliders);
    }
}
