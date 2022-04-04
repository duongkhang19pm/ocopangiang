@extends('layouts.frontend')
@section('pagetitle')
    Sản Phẩm Theo Nhóm
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$nhomsanpham->tennhom}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <a href="{{route('frontend.sanpham')}}">Sản Phẩm OCOP</a>
                            <span>{{$nhomsanpham->tennhom}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if(session('status'))
        <div id="thongbao" class="alert alert-success hide thongbao" role="alert">
            <span class="fas fa-check-circle"></span>
            <span class="msg">{!! session('status') !!}</span>           
        </div>    
    @endif
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Loại Sản Phẩm</h4>
                            <ul>
                                @foreach($loaisanpham as $value)
                                    <li><a href="{{route('frontend.sanpham.loaisanpham',['tennhom_slug'=>$nhomsanpham->tennhom_slug, 'tenloai_slug'=>$value->tenloai_slug])}}">{{$value->tenloai}}</a></li>
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
                           <h2>Sản Phẩm Mới</h2>
                        </div>
                        <div class="row">
                             <div class="product__discount__slider owl-carousel">
                                @foreach($loaisanpham as $loai)
                                    @foreach($loai->sanpham as $value)
                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                               
                                                    <div class="product__discount__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">
                                                        <ul class="product__item__pic__hover">
                                                        @guest
                                                @else
                                                    @php
                                                        $yeuthich = false;
                                                    @endphp
                                                    @foreach($sanphamyeuthich as $sp_yeuthich)
                                                        @if($sp_yeuthich->sanpham_id == $value->id)
                                                            @php
                                                                $yeuthich = true;
                                                            @endphp
                                                            <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart text-danger"></i></a></li>
                                                            @break
                                                        @endif                                      
                                                    @endforeach
                                                    @if($yeuthich==false)
                                                        <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart "></i></a></li>
                                                    @endif
                                                @endguest    
                                                        <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-eye"></i></a></li>
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
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <form action="{{ route('frontend.sanpham') }}" method="post">
                                         @csrf
                                         <select class="form-control form-control-sm" id="sapxep" name="sapxep" onchange="if(this.value != 0) { this.form.submit(); }">
                                         <option value="default" {{ session('sapxep') == 'default' ? 'selected' : '' }}>Sắp xếp mặc định</option>
                                         <option value="BUY" {{ session('sapxep') == 'BUY' ? 'selected' : '' }}>Mua nhiều nhất</option>
                                         <option value="NEW" {{ session('sapxep') == 'NEW' ? 'selected' : '' }}>Hàng mới nhất</option>
                                         <option value="ASC" {{ session('sapxep') == 'ASC' ? 'selected' : '' }}>Giá thấp đến cao</option>
                                         <option value="DESC" {{ session('sapxep') == 'DESC' ? 'selected' : '' }}>Giá cao xuống thấp</option>
                                         </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    
                                @php
                                $dem =0;
                                @endphp  
                                @foreach($loaisanpham as $loai)
                                    @foreach($loai->sanpham as $value)  
                                        @php
                                            $dem ++;
                                        @endphp
                                        
                                    @endforeach
                                @endforeach
                                <h6><span>{{$dem}}</span>sản phẩm</h6>
                             
                                        
                                    
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
            <div class="row featured__filter">
                @foreach($loaisanpham as $loai)
                    @foreach($loai->sanpham as $value)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix "  >
                            
                            <div class="featured__item">
                                
                                
                                    <div class="featured__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">


                                        <ul class="featured__item__pic__hover">
                                        @guest
                                        @else
                                            @php
                                                $yeuthich = false;
                                            @endphp
                                            @foreach($sanphamyeuthich as $sp_yeuthich)
                                                @if($sp_yeuthich->sanpham_id == $value->id)
                                                    @php
                                                        $yeuthich = true;
                                                    @endphp
                                                    <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart text-danger"></i></a></li>
                                                    @break
                                                @endif                                      
                                            @endforeach
                                            @if($yeuthich==false)
                                                <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart "></i></a></li>
                                            @endif
                                        @endguest
                                            <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" ><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                

                                    
                                
                            
                                
                                <div class="featured__item__text">
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
                @endforeach
            </div> 
            
        </div>
    </section>




@endsection