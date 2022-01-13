@extends('layouts.khachhang')

@section('pagetitle')
	Hồ Sơ Của Tôi
@endsection

@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$taikhoan->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Hồ Sơ Của Tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {!! session('status') !!}
        </div>
    @endif
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                       
                            <span class="user-avatar user-avatar-md">
                                @if((Auth::user()->hinhanh)==null)
                                 <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" width="100">
                                @else
                                <img src="{{env('APP_URL').'/storage/app/'.Auth::user()->hinhanh  }}" width="100"/>
                                @endif
                            </span>
                            
                            
                            <div class="mt-3 text-left ">
                               <a href="{{route('khachhang.capnhathoso',['id'=>$taikhoan->id])}}" class="site-btn w-75">
                               Hồ Sơ Cá Nhân
                                </a> 
                            </div>
                            <div class="mt-3 text-left ">
                               <a href="{{route('khachhang.donhang',['id'=>$taikhoan->id])}}" class="site-btn w-75">
                                Đơn Hàng Của Tôi
                                </a> 
                            </div>
                            <div class="mt-3 text-left ">
                               <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="site-btn w-75">
                                Đăng Xuất
                                </a> 
                                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                  @csrf
                                  </form>
                            </div>

                          
                        </div>
                        
                       
                       
                       
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Xin Chào {{$taikhoan->name}}</h2>
                        </div>
                       
                    </div>
                    <div class="shoping__cart__table">
                    
                        
                       
                        
                    </div>
                </div>
          
            </div>
        </div>
    </section>

@endsection
