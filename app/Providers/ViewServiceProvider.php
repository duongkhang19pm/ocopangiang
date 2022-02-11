<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\NhomSanPham;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::Composer('frontend.nav',function($view){
            $nhomsanpham = NhomSanPham::orderBy('tennhom')->get();
            $view->with('nhomsanpham',$nhomsanpham);
        });
    }
}
