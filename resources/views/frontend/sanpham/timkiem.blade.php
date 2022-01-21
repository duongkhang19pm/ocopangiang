@extends('layouts.frontend')
@section('pagetitle')
    Sản Phẩm Tìm Kiếm
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản Phẩm OCOP</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Sản Phẩm OCOP</span>
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
                            <h4>Nhóm Sản Phẩm</h4>
                            <ul>
                                @foreach($nhomsanpham as $value)
                                    <li><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>$value->tennhom_slug])}}">{{$value->tennhom}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Phân Hạng OCOP</h4>
                            <ul>
                                @foreach($phanhang as $value)

                                    @if( $value->id  == 1)
                                    <li>
                                        <a href="{{route('frontend.phanhang',['tenphanhang_slug'=>$value->tenphanhang_slug])}}">
                                            <span class="fa fa-star " style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if( $value->id  == 2)
                                    <li>
                                        <a href="{{route('frontend.phanhang',['tenphanhang_slug'=>$value->tenphanhang_slug])}}">
                                            <span class="fa fa-star " style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                        </a>
                                    </li>
                                    @endif
                                     @if( $value->id  == 3)
                                   <li>
                                        <a href="{{route('frontend.phanhang',['tenphanhang_slug'=>$value->tenphanhang_slug])}}">
                                            <span class="fa fa-star " style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if( $value->id  == 4)
                                    <li>
                                        <a href="{{route('frontend.phanhang',['tenphanhang_slug'=>$value->tenphanhang_slug])}}">
                                            <span class="fa fa-star " style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:SlateGray"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if( $value->id  == 5)
                                    <li>
                                        <a href="{{route('frontend.phanhang',['tenphanhang_slug'=>$value->tenphanhang_slug])}}">
                                            <span class="fa fa-star " style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </a>
                                    </li>
                                    @endif
                                   
                               @endforeach
                            </ul>
                        </div>
                       
                       
                       
                    </div>
                </div>
               
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                           @if($sanpham->isEmpty())
                            <h2 ><i class="far fa-lightbulb mr-2"></i>Xin lỗi , không tìm thấy kết quả nào cho từ khóa: <strong>'{{$key}}'</strong></h2>
                            @else
                             <h2 ><i class="far fa-lightbulb mr-2"></i>Kết quả tìm được cho từ khóa: <strong>'{{$key}}'</strong></h2>
                        </div>
                         
                        <div class="section-title product__discount__title">
                            <h2>Sản Phẩm Mới</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                               @foreach($sanpham as $value)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                           
                                                <div class="product__discount__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">
                                                    <ul class="product__item__pic__hover">
                                                        
                                                    <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" ><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                
                                            
                                            <div class="product__discount__item__text">
                                             
                                                <h5><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h5>
                                                <div class="product__item__price">{{ number_format($value->dongia ) }} <sup>VNĐ</sup></div>
                                                <div class="product__item__price">
                                                  @foreach($value->ChiTiet_PhanHang_SanPham as $ct)
                                                    @if( $ct->phanhang_id  == 1)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 2)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 3)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 4)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 5)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{$sanpham->count()}}</span>sản phẩm</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                           @foreach($sanpham as $value)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    
                                   
                                        <div class="product__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">
                                            <ul class="product__item__pic__hover">
                                                
                                                <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" ><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                         
                                  
                                   
                                    <div class="product__item__text">
                                        <h6><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h6>
                                         <h5>{{ number_format($value->dongia ) }} <sup>VNĐ</sup></h5>
                                         @foreach($value->ChiTiet_PhanHang_SanPham as $ct)
                                            @if( $ct->phanhang_id  == 1)
                                                <span class="fa fa-star " style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                            @endif
                                            @if( $ct->phanhang_id  == 2)
                                                <span class="fa fa-star " style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                            @endif
                                            @if( $ct->phanhang_id  == 3)
                                                <span class="fa fa-star " style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                            @endif
                                            @if( $ct->phanhang_id  == 4)
                                                <span class="fa fa-star " style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:SlateGray"></span>
                                            @endif
                                            @if( $ct->phanhang_id  == 5)
                                                <span class="fa fa-star " style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                                <span class="fa fa-star"style="color:Gold"></span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__discount">
                        {{$sanpham->links()}}
                        
                    </div>
                </div>
                  @endif
            </div>
        </div>
    </section>




@endsection