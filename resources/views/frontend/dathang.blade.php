@extends('layouts.frontend')
@section('pagetitle')
    Đặt Hàng
@endsection
@section('content')
@include('frontend.nav')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Thanh Toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     
                    @guest
                        <h6>
                            <span > 
                                <i class="fas fa-user"></i>Đã từng đăng ký?
                                <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Nhấn vào để đăng nhập</a>
                            </span>
                        </h6>
                        
                        <div class="login_register_wrap section panel-collapse collapse login_form mt-3" id="loginform">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-md-10">
                                        <div class="login_wrap">
                                            <div class="padding_eight_all bg-white">
                                                <div class="heading_s1">
                                                <h3 align="center">Đăng nhập</h3>
                                                <hr>
                                                </div>                              
                                                <form action="{{ route('login') }}" method="post">
                                                
                                                    @csrf
                                                    <div class="form-group">                                
                                                        <input type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Tên đăng nhập hoặc Email *" required />
                                                        @if ($errors->has('email') || $errors->has('username'))
                                                            <span class="invalid-feedback" role="alert"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">                            
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu *" required />
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group form-check">
                                                        <div class="custome-checkbox">
                                                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="remember"><span>Nhớ thông tin đăng nhập</span></label>
                                                            </div>
                                                        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <span >Hoặc</span>
                                                    </div>
                                                    <div class="form-group">                                
                                                        <a href="#" class="btn btn-danger btn-block"><i class="ion-social-googleplus"></i>Google</a>
                                                    </div>
                                                </form>                     
                                                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="{{ route('khachhang.dangky') }}">Đăng ký ngay</a></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h6>
                            <span > 
                                <span><i class="fas fa-user mr-2"></i> Bạn đã đăng nhập với tài khoản khách hàng <strong>{{ Auth::user()->name }}</strong>.</span>
                            </span>
                        </h6>
                        
                    @endguest
                </div>
            </div>
            <div class="checkout__form">
                
                <h4>THÔNG TIN GIAO HÀNG</h4>
                <form action="{{ route('frontend.dathang') }}" method="post" id="checkoutform" enctype="multipart/form-data">
                  @csrf
                 
                    <div class="row">
                      <div class="col-lg-7 col-md-6">
                            <div class="checkout__order">
                                <div class="checkout__order__products">Họ và Tên : {{$hoten}}</div>
                                <div class="checkout__order__products">Điện thoại: {{$dienthoaigiaohang}} </div>
                                <div class="checkout__order__products">Email: {{$email}} </div>
                                <div class="checkout__order__products">Địa chỉ: {{ $tenduong}} , {{ $xa->tenxa }} , {{ $huyen->tenhuyen }} , {{ $tinh->tentinh }}</div>
                                <a href="{{ route('frontend.nhapthongtin') }}" class="primary-btn ">CẬP NHẬT THÔNG TIN GIAO HÀNG</a>
                            </div>
                     
                            
                            <div class="cart-detail mt-3">
                                <p>Hình Thức Thanh Toán</p>
                                 <div class="col-lg-12">
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios1" value="1" checked />
                                        <label class="form-check-label" for="exampleRadios1">Thanh toán khi nhận hàng (COD - giao hàng và thu tiền tận nơi)</label>
                              
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios2" value="2" />
                                        <label class="form-check-label" for="exampleRadios2">Thanh toán qua thẻ tín dụng, thẻ ghi nợ</label>
                                     
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios3" value="3" />
                                        <label class="form-check-label" for="exampleRadios3">Thanh toán bằng thẻ ATM nội địa</label>
                              
                                    </div>
                                     <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios4" value="4" />
                                        <label class="form-check-label" for="exampleRadios4">Chuyển tiền trực tiếp vào tài khoản người bán</label>
                              
                                    </div>
                                     <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios5" value="5" />
                      
                                    </div>
                                     <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="hinhthucthanhtoan_id" id="exampleRadios6" value="6" />
                                        <label class="form-check-label" for="exampleRadios6">Thanh toán qua đơn vị trung gian</label>
                                        
                                    </div>
                                </div>
                                    
                                   
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Ghi chú bổ sung</p>
                                        <textarea  class="form-control" placeholder="Thông tin bổ sung khi giao hàng" name="ghichubosung"></textarea>
                                    </div>
                                </div>        
                            </div>
                   

                           
                        </div>


                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4>ĐƠN HÀNG CỦA BẠN</h4>
                                <div class="checkout__order__products">Sản Phẩm (Số Lượng) <span>Tổng Tiền</span></div>
                                <ul>
                                    @php $tongtien = 0; @endphp
                                    @foreach(Cart::content() as $value)
                                    <li>{{ $value->name }} ({{$value->qty}}) <span>{{ number_format($value->price * $value->qty)}}<sup>VNĐ</sup> </span>
                                    </li>
                                     @php $tongtien += $value->price * $value->qty; @endphp
                                    @endforeach   

                                    
                                </ul>
                                <div class="checkout__order__subtotal">Tổng tiền sản phẩm <span>{{ Cart::subtotal() }}<sup>VND</sup></span></div>
                                <div class="checkout__order__subtotal">Thuế VAT (10%)<span>{{ Cart::tax() }}<sup>VND</sup></span></div>
                                <div class="checkout__order__subtotal">Phí Vận Chuyển<span >
                                    {{ number_format($huyen->phivanchuyen)}} 
                                    <sup>VND</sup></span>

                                   
                                </div>


                                <div class="checkout__order__total">Tổng Thanh Toán <span>{{ number_format($tongtien + $huyen->phivanchuyen)}}  <sup>VND</sup></span></div>
                               
                                <button type="submit" class="site-btn" href="{{ route('frontend.dathang') }}"onclick="event.preventDefault();document.getElementById('checkoutform').submit();">TIẾN HÀNH ĐẶT HÀNG</button>
                            </div>
                        </div>
                        
                        
                      
                      
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('getHuyen') }}?tinh_id=" + tinhID,
                        success: function(res) {

                            if (res) {

                                $("#huyen_id").empty();
                                $("#huyen_id").append('<option>--Chọn Quận/Huyện--</option>');
                                $.each(res, function(key, value) {
                                    $("#huyen_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#huyen_id").empty();
                            }
                        }
                    });
                } else {

                    $("#huyen_id").empty();
                    $("#xa_id").empty();
                }
            });

            // when state dropdown changes
            $('#huyen_id').on('change', function() {

                var huyenID = $(this).val();

                if (huyenID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('getXa') }}?huyen_id=" + huyenID,
                        success: function(res) {

                            if (res) {
                                $("#xa_id").empty();
                                $("#xa_id").append('<option>--Chọn Xã/Phường--</option>');
                                $.each(res, function(key, value) {
                                    $("#xa_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#xa_id").empty();
                            }
                        }
                    });
                } else {

                    $("#xa_id").empty();
                }
            });
            // when state dropdown changes
            $('#huyen_id').on('change', function() {

                var huyenID = $(this).val();

                if (huyenID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('getPhi') }}?huyen_id=" + huyenID,
                        success: function(res) {

                            if (res) {
                                $("#phi").empty();
                                $("#phi").append('');
                                $.each(res, function(key, value) {
                                    $("#phi").append('<a>' + value +
                                        '</a>');
                                });

                            } else {

                                $("#phi").empty();
                            }
                        }
                    });
                } else {

                    $("#phi").empty();
                }
            });
      
        });

</script>
@endsection