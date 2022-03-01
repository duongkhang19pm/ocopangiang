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
                        <h2>Đơn Hàng Của Tôi</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Đơn Hàng Của Tôi</span>
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
                            <h2>Đơn Hàng Của Tôi</h2>
                        </div>
                       
                    </div>
                    <div class="shoping__cart__table">
                        @if(count($donhang) < 1)
                            <p> Bạn chưa có đơn hàng nào. Vui lòng mua hàng để có đơn hàng mới</p>
                        @else
                        <table>
                            <thead>
                                <tr>
                                    <th >#</th>
                                  
                                    <th>Thông tin giao hàng </th>
                               
                                    <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($donhang as $value)
                                                          
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            
                                            <td class="text-left">
                                                Điện thoại: <strong>{{ $value->dienthoaigiaohang }}</strong>
                                                <span class="d-block">Địa chỉ giao: <strong>{{ $value->Xa->Huyen->Tinh->tentinh }} - {{ $value->Xa->Huyen->tenhuyen }} - {{ $value->Xa->tenxa }}  -  Đường:{{ $value->tenduong }}</strong></span>
                                                <span class="d-block">Hình thức thanh toán: <strong>{{ $value->HinhThucThanhToan->hinhthucthanhtoan }}</strong></span>
                                                <span class="d-block">Ngày đặt: <strong>{{ $value->created_at->format('d/m/Y H:i:s') }}</strong></span>
                                               
                                                <span class="d-block">Sản phẩm:</span>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <th >#</th>
                                                            <th >Sản phẩm</th>
                                                            <th >Số lượng</th>
                                                            <th >Đơn giá</th>
                                                            <th >VAT</th>
                                                            <th >Thành tiền</th>
                                                            <th>Tình trạng</th>
                                                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                                        </thead>
                                                        <tbody>
                                                            @php $tongtien = 0; @endphp
                                                            @foreach($value->donhang_chitiet as $chitiet)
                                                               
                                                                <tr>
                                                                    
                                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                                    <td class="align-middle">{{ $chitiet->sanpham->tensanpham }}</td>
                                                                    <td class="align-middle">{{ $chitiet->soluongban }}</td>
                                                                    <td class="text-end">{{ number_format($chitiet->sanpham->dongia) }}<sup><u>đ</u></sup></td>
                                                                    <td class="text-end">{{ number_format($chitiet->sanpham->dongia *0.1) }}<sup><u>đ</u></sup></td>
                                                                    <td class="text-end">{{ number_format($chitiet->dongiaban) }}<sup><u>đ</u></sup></td>
                                                                    <td> {{$chitiet->TinhTrang->tinhtrang}}</td>
                                                                    <td class="align-middle text-right">
                                                                          <a href="{{ route('khachhang.donhang.huy', ['taikhoan'=>$taikhoan->id,'id' => $chitiet->id]) }}" class="site-btn btn-danger">
                                                                            
                                                                            <span >Hủy Đơn</span>
                                                                          </a>

                                                                        
                                                                    </td>
                                                                </tr>
                                                                @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
                                                           
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="6" class="text-left">Phí vận chuyển:</td>
                                                                
                                                                <td class="text-end"><strong>{{ number_format($value->Xa->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
                                                            </tr>
                                                             <tr>
                                                                    
                                                                <td colspan="6" class="text-left">Tổng tiền sản phẩm:</td>
                                                                <td class="text-end"><strong>{{ number_format($tongtien + $value->Xa->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
                                                            </tr>
                                                        
                                                        </tbody>
                                                    </table>

                                                
                                            </td>
                                           
                                             <td class="align-middle text-right">
                                                 
                                                   @if($value->hienthi == 1)
                                                    <a href="{{ route('khachhang.donhang.hienthi', ['taikhoan'=>$taikhoan->id,'id' => $value->id])  }}" class="site-btn"><span >Xóa Đơn</span></a>
                                                @endif
                                            </td>
                                            
                                         </tr>
                         
                             @endforeach

                            </tbody>
                        </table>
                        <div class="product__discount mt-3">
                       {{$donhang->links()}}
                        
                        </div>
                        @endif
                       
                        
                    </div>
                </div>
          
            </div>
        </div>
    </section>

@endsection
