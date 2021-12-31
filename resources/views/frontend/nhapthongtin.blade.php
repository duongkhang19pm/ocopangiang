@extends('layouts.frontend')

@section('content')
@include('frontend.nav')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Nhập Thông Tin Giao Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Nhập Thông Tin Giao Hàng</span>
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
                
                            <h4 class="text-center">THÔNG TIN GIAO HÀNG</h4>
                            <form action="{{ route('frontend.nhapthongtin') }}" method="post" id="checkoutform" enctype="multipart/form-data">
                              @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="checkout__input">
                                                <p>Họ và Tên<span>*</span></p>
                                                <input type="text" required class="form-control @error('hoten') is-invalid @enderror" name="hoten" placeholder="Họ và tên *" value="{{ Auth::user()->name ?? '' }}" required />
                                                @error('hoten')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div> 
                                    <div class="row">
                                          <div class="col-lg-4">
                                              <label for="tinh">Tỉnh/Thành Phố
                                                <abbr title="Required">*</abbr>
                                              </label>
                                              <select class="custom-select d-block w-100 @error('tinh_id') is-invalid @enderror" id="tinh_id" name="tinh_id" required>
                                                <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                                                 @foreach($tinh as $value)
                                                    <option value="{{ $value->id }}">{{ $value->tentinh }}</option>
                                                 @endforeach
                                              </select>
                                              <div class="invalid-feedback">Vui lòng chọn tỉnh/thành phố . </div>
                                               @error('tinh_id')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                     
                                            <div class="col-lg-4">
                                                      <label for="huyen">Quận/Huyện
                                                        <abbr title="Required">*</abbr>
                                                      </label>
                                                      <select class="custom-select d-block w-100 @error('huyen_id') is-invalid @enderror" id="huyen_id" name="huyen_id" required>
                                                        <option value="" >-- Chọn Quận/Huyện--</option>
                                                      </select>
                                                      <div class="invalid-feedback">Vui lòng chọn quận/huyện . </div>
                                                       @error('huyen_id')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                        @enderror
                                            </div>
                                            <div class="col-lg-4">
                                                      <label for="xa">Xã/Phường
                                                        <abbr title="Required">*</abbr>
                                                      </label>
                                                      <select class="custom-select d-block w-100 @error('xa_id') is-invalid @enderror" id="xa_id" name="xa_id" required>
                                                        <option value="" >-- Chọn Xã/Phường --</option>
                                                      </select>
                                                      <div class="invalid-feedback">Vui lòng chọn xã/phường . </div>
                                                       @error('xa_id')
                                                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                        @enderror
                                            </div>
                                            
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 mt-3">
                                            <label for="tenduong">Số Đường/Nhà<span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ old('tenduong') }}" placeholder="Tên Đường/Số Nhà" required />
                                              
                                            @error('tenduong')
                                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Điện Thoại<span>*</span></p>
                                                <input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" name="dienthoaigiaohang" placeholder="Điện thoại *"value="{{ Auth::user()->phone ?? '' }}" required />
                                                @error('dienthoaigiaohang')
                                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout__input">
                                                <p>Email<span>*</span></p>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Địa chỉ Email *" value="{{ Auth::user()->email ?? '' }}" required />
                                                @error('email')
                                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                       
                                 @guest
                                    <div class="checkout__input__checkbox">
                                        <label for="acc">
                                            Đăng ký tài khoản?
                                            <input type="checkbox" id="acc">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__input">
                                        <p>Mật Khẩu<span>*</span></p>
                                        <input type="password" required class="form-control" placeholder="Mật khẩu" name="password" />
                                    </div>
                                @endguest
                            </form>
                           
                                    <a href="{{ route('frontend.nhapthongtin') }}"onclick="event.preventDefault();document.getElementById('checkoutform').submit();" class="primary-btn ">TIẾP THEO</a>
                        
                           
                        
                
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