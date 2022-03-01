@extends('layouts.admin')
@section('pagetitle')
  Thêm Tài Khoản Quản Lý
@endsection
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>

                </li>
                <li class="breadcrumb-item active">
                  <a href="{{ route('admin.taikhoan_admin') }}">Danh Sách</a>
                  
                </li>
              </ol>
            </nav>    
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm Tài Khoản Quản Trị Viên </h1>
                </div>
            <!-- /title and toolbar -->
        </header>
        <div class="page-section">
          <!-- .card -->
          <section class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              <div class="table-responsive">

                <!-- form .needs-validation -->
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.taikhoan_admin.them') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <!-- .form-group -->
                   
                      <div class="row">
                         <div class="col-md-4">
                          <label for="name">Họ và tên <abbr title="Bắt buộc nhập">*</abbr></label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
                          @error('name')
                            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                          @enderror
                        </div>
                          <div class="col-md-4">
                          <label for="email">Email <abbr title="Bắt buộc nhập">*</abbr></label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                          @error('email')
                            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                          @enderror
                        </div>
                        
                    
                        <div class="col-md-4">
                          <label for="phone">Điện Thoại <abbr title="Bắt buộc nhập">*</abbr></label>
                          <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required />
                          @error('phone')
                            <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                          @enderror
                        </div>
                    
                      </div>
                      <hr/>
                      <h4 class="card-title text-center"> Địa Chỉ </h4>
                  <div class="row">
                       <div class="col-md-3">
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
                 
                         <div class="col-md-3">
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
                          <div class="col-md-3">
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
                           <div class="col-md-3">
                              <label for="tenduong">Số Đường/Nhà<span class="text-danger font-weight-bold">*</span></label>
                              <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ old('tenduong') }}" placeholder="Tên Đường/Số Nhà" required />
                                  
                                @error('tenduong')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                          </div>
                    </div>
                     <hr/>
                     <div class="row">
                   <div class="col-md-6">
                         <label class="form-label" for="hinhanh">Hình ảnh </label>
                         <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
                         @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                         @enderror
                     </div>
                       <div class="col-md-6">
                      <label for="username">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required />
                      @error('username')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                    </div>
                     <hr/>
                 <div class="row">
                     
                   

                   <div class="col-md-6">
                      <label class="form-label d-flex justify-content-between" for="password"><span>Mật khẩu <abbr title="Bắt buộc nhập">*</abbr></span>
                          <a href="#matkhau" data-toggle="password">
                              <i class="fa fa-fw fa-eye"></i>
                              <span>Show</span>
                          </a>

                        </label>
                  
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="matkhau" name="password" required />
                      @error('password')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                  <div class="col-md-6">
                      <label class="form-label d-flex justify-content-between" for="password_confirmation"><span>Xác nhận mật khẩu <abbr title="Bắt buộc nhập">*</abbr></span>
                          <a href="#xacnhan" data-toggle="password">
                              <i class="fa fa-fw fa-eye"></i>
                              <span>Show</span>
                          </a>

                        </label>
                   
                      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="xacnhan" name="password_confirmation" required />
                      @error('password_confirmation')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                  </div>


                  <!-- /.form-row -->
                  <hr class="mb-4">
                 
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Thêm</button>
               
                  
                </form>
              <!-- /form .needs-validation -->
              </div>
            </div>
          </section>
               
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div> 
</div> 
@endsection
@section('javascript')

<script src="{{ asset('public/assets/javascript/main.min.js') }}"></script>
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.taikhoan_admin.getHuyen') }}?tinh_id=" + tinhID,
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
                        url: "{{ route('admin.taikhoan_admin.getXa') }}?huyen_id=" + huyenID,
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
        });
</script>
@endsection