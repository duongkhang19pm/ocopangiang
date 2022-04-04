<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\NhomSanPham;
use App\Models\SanPhamYeuThich;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check())
        {
            View::Composer('layouts.frontend',function($view){
                $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
                $view->with('sanphamyeuthich',$sanphamyeuthich);
            });
        }
        
    }
}
