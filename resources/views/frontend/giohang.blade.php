@extends('layouts.frontend')
@section('pagetitle')
    Giỏ Hàng
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Giỏi Hàng</span>
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
                                    <th width="55%" class="shoping__product">Sản Phẩm</th>
                                    <th width="10%">Đơn giá</th>
                                    <th width="15%">Số lượng</th>
                                    <th width="10%">Thành tiền</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $stt = 1; @endphp
                                @foreach(Cart::content() as $value)

                                  
                                  
                                    <tr>
                                        
                                        <td>{{ $stt++ }}</td>
                                        <td class="shoping__cart__item">
                                            <img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" width="100" height="100" alt="">
                                            <h5>{{ $value->name }}</h5>
                                             
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format( $value->price) }}<sup>VNĐ</sup>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="input-group">
                                                <span class="input-group-text"><a href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"><i class="fas fa-minus"></i></a></span>
                                                <input type="text" class="form-control text-center" value="{{ $value->qty }}" size="10" />
                                                <span class="input-group-text"><a href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}"><i class="fas fa-plus"></i></a></span>
                                            </div>
                                            
                                        </td>
                                         <td class="shoping__cart__total">
                                            {{ number_format($value->price * $value->qty) }}<sup>VNĐ</sup>
                                        </td>
                                        <td class="text-center"><a href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}"><i class="fas fa-times text-danger"></i></a></td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('frontend') }}" class="primary-btn cart-btn">TIẾP TỤC MUA HÀNG</a>
                        <a href="{{ route('frontend.giohang.xoatatca') }}" class="primary-btn cart-btn cart-btn-right">
                            XÓA GIỎ HÀNG</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>MÃ GIẢM GIÁ</h5>
                            <form action="#">
                                <input type="text" placeholder="Mã code">
                                <button type="submit" class="site-btn">ÁP DỤNG</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng Tiền </h5>
                        <ul>
                            <li>Tổng tiền sản phẩm <span>{{ Cart::subtotal() }}<sup>VNĐ</sup></span></li>
                            <li>Tổng tiền thuế VAT (10%) <span>{{ Cart::tax() }}<sup>VNĐ</sup></span></li>
                            <li>Tổng tiền đơn hàng <span>{{ Cart::priceTotal() }} <sup>VNĐ</sup></span></li>
                        </ul>
                        <a href="{{ route('frontend.nhapthongtin') }}" class="primary-btn">TIẾP THEO</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection