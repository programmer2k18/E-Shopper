<?php

namespace App\Providers;
use App\manufacture;
use App\Products;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Slider;
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

    public function boot()
    {
        $categories = Category::where('publication_status','=',1)->get();
        view()->share('publishedCategories',$categories);

        $brands = manufacture::where('publication_status','=',1)->get();
        view()->share('publishedBrands',$brands);

        $sliders = Slider::where('publication_status','=',1)->get();
        view()->share('sliders',$sliders);

        $products = Products::where('quantity','>',0)->where('publication_status','=',1)->get();
        view()->share('products',$products);
    }
}
