@extends('layouts.khachhang')
@section('pagetitle')
    Nhập Thông Tin
@endsection
@section('content')
@include('frontend.nav')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Hồ Sơ Cá Nhân</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Hồ Sơ Cá Nhân</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

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
                    <form action="{{ route('khachhang.capnhathoso',['id'=> $taikhoan->id]) }}" method="post"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                             <div class="col-md-4">
                              <label for="name">Họ và tên <abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $taikhoan->name }}" required />
                              @error('name')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            </div>
                            <div class="col-md-4">
                              <label for="email">Email <abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $taikhoan->email }}" required />
                              @error('email')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            </div>
                            <div class="col-md-4">
                              <label for="phone">Điện Thoại <abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $taikhoan->phone }}" required />
                              @error('phone')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            </div>
                         
                        </div>
                        <hr class="mb-4">
                        <h4 class="card-title text-center"> Địa Chỉ </h4>
                        <div class="row">
                          <div class="col-md-3">
                              <label for="tinh">Tỉnh/Thành Phố
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('tinh_id') is-invalid @enderror" id="tinh_id" name="tinh_id" required>
                                <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                                 @foreach($tinh as $value)
                                    <option value="{{ $value->id }}" {{ ($taikhoan->tinh_id == $value->id) ? 'selected' : '' }}>{{ $value->tentinh }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn tỉnh/thành phố . </div>
                               @error('tinh_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                          </div>
                          <div class="col-md-3">
                                  <label for="huyen">Quận/Huyện
                                    <abbr title="Required">*</abbr>
                                  </label>
                                  <select class="custom-select d-block w-100 @error('huyen_id') is-invalid @enderror" id="huyen_id" name="huyen_id" required>
                                    
                                     @foreach($huyen as $value)
                                        <option value="{{ $value->id }}" {{ ($taikhoan->huyen_id == $value->id) ? 'selected' : '' }}>{{ $value->tenhuyen }}</option>
                                     @endforeach
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn quận/huyện . </div>
                                   @error('huyen_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                          </div>
                          <div class="col-md-3">
                                  <label for="xa">Xã/Phường
                                    <abbr title="Required">*</abbr>
                                  </label>
                                  <select class="custom-select d-block w-100 @error('xa_id') is-invalid @enderror" id="xa_id" name="xa_id" required>
                                    @foreach($xa as $value)
                                        <option value="{{ $value->id }}" {{ ($taikhoan->xa_id == $value->id) ? 'selected' : '' }}>{{ $value->tenxa }}</option>
                                     @endforeach
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn xã/phường . </div>
                                   @error('xa_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                          </div>
                          <div class="col-md-3">
                              <label for="tenduong">Số Đường<span class="text-danger font-weight-bold">*</span></label>
                              <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ $taikhoan->tenduong }}" placeholder="Tên Đường/Số Nhà" required />
                                  
                                @error('tenduong')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                          </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                             <label class="form-label" for="hinhanh">Hình ảnh đại diện</label>
                             @if(!empty($taikhoan->hinhanh))
                                 <img class="d-block rounded" src="{{env('APP_URL').'/storage/app/'.$taikhoan->hinhanh}}" width="100" />
                                 <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                             @endif
                            <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $taikhoan->hinhanh }}" />
                             @error('hinhanh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                             @enderror
                            </div>
                            <div class="col-md-6">
                              <label for="username">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $taikhoan->username }}" required />
                              @error('username')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="mb-3 form-check">
                          <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                          <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
                        </div>

                        <div id="change_password_group">
                         
                            <div class="row">
                              <div class="col-md-6">
                            <label class="form-label d-flex justify-content-between" for="password"><span>Mật khẩu mới</span>
                              <a href="#matkhau" data-toggle="password">
                                  <i class="fa fa-fw fa-eye"></i>
                                  <span>Show</span>
                              </a>

                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="matkhau" name="password" />
                            @error('password')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                          </div>

                          <div class="col-md-6">
                            <label class="form-label d-flex justify-content-between" for="password"><span>Xác nhận mật khẩu mới</span>
                              <a href="#xacnhan" data-toggle="password">
                                  <i class="fa fa-fw fa-eye"></i>
                                  <span>Show</span>
                              </a>

                            </label>
                            
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="xacnhan" name="password_confirmation" />
                            @error('password_confirmation')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                          </div>
                            </div>
                        </div>

                   
                        <hr class="mb-4">
                       
                        <button class="site-btn " type="submit"><i class="fas fa-save mr-2"></i>Cập Nhật</button>
                                       
                                 
                    </form>

             </div>
          
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

 <script>
    $(document).ready(function() {
        $("#change_password_group").hide();
        $("#change_password_checkbox").change(function() {
            if($(this).is(":checked"))
            {
                $("#change_password_group").show();
                $("#change_password_group :input").attr("required", "required");
            }
            else
            {
                $("#change_password_group").hide();
                $("#change_password_group :input").removeAttr("required");
            }
        });
    });
</script>
 <script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
@endsection