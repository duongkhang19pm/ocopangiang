@extends('layouts.frontend')
@section('pagetitle')
    Sản Phẩm Yêu Thích Của Khách Hàng
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản Phẩm Yêu Thích Của {{Auth::user()->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Sản Phẩm Yêu Thích Của {{Auth::user()->name}}</span>
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
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                    
                        <table>
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="50%" class="shoping__product">Sản Phẩm</th>
                                    <th width="20%">Đơn giá</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach($sanphamyeuthich as $value)

                                  
                                  
                                    <tr>
                                        
                                        <td>{{ $stt++ }}</td>
                                        <td class="shoping__cart__item">
                                            <img src="{{ env('APP_URL') . '/storage/app/' . $value->sanpham->hinhanh }}" width="100" height="100" alt="">
                                            <h5>{{ $value->sanpham->tensanpham }}</h5>   
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format( $value->sanpham->dongia) }}<sup>VNĐ</sup>
                                        </td>
                                        
                                        <td class="text-center"><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->sanpham->tensanpham_slug]) }}" class="primary-btn">Thêm Vào Giỏ</a></td>
                                        <td class="text-center"><a href="{{ route('frontend.sanphamyeuthich.xoa', ['id' => $value->id]) }}" ><i class="fas fa-times text-danger"></i></a></td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('frontend') }}" class="primary-btn cart-btn">QUAY VỀ</a>
                        <a href="{{ route('frontend.sanphamyeuthich.xoatatca') }}" class="primary-btn cart-btn cart-btn-right"> XÓA TẤT CẢ</a>
                    </div>
                </div>
            
        </div>
    </section>




@endsection