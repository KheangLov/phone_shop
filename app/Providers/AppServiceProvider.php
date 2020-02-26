<?php

namespace App\Providers;

use App\Category;
use App\Product;
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
        // $categories = Category::limit(6)->get();
        $sliders = Slider::all();
        $products = Product::limit(6)->get();
        // View::share('categories', $categories);
        View::share('products', $products);
        View::share('sliders', $sliders);
    }
}
