@extends('layouts.admin')
@section('pagetitle')
  Hồ Sơ Cá Nhân
@endsection
@section('content')

<div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-cover -->
            <header class="page-cover">
              <div class="text-center">
                <a href="user-profile.html" class="user-avatar user-avatar-xl">
                 
                  @if(empty($taikhoan->hinhanh))
                    <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
                  @else
                    <img src="{{env('APP_URL').'/storage/app/'.$taikhoan->hinhanh  }}"height="90" width="100" />
                  @endif
                </a>
                <h2 class="h4 mt-2 mb-0"> {{ Auth::user()->name }} </h2>
                
              </div><!-- .cover-controls -->
              
            </header><!-- /.page-cover -->
            
            
            <!-- .page-inner -->
            <div class="page-inner">
              <!-- .page-title-bar -->
              <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                      <a href="user-profile.html"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Overview</a>
                    </li>
                  </ol>
                </nav>
              </header><!-- /.page-title-bar -->
              <!-- .page-section -->
              <div class="page-section">
                <!-- grid row -->
                <div class="row">
                  <!-- grid column -->
                  <div class="col-lg-2">
                    <!-- .card -->
                    <div class="card card-fluid">
                      <h6 class="card-header"> Your Details </h6><!-- .nav -->
                      <nav class="nav nav-tabs flex-column border-0">
                        <a href="user-profile-settings.html" class="nav-link active">Profile</a> <a href="user-account-settings.html" class="nav-link">Account</a> <a href="user-billing-settings.html" class="nav-link">Billing</a> <a href="user-notification-settings.html" class="nav-link">Notifications</a>
                      </nav><!-- /.nav -->
                    </div><!-- /.card -->
                  </div>
                  <!-- grid column -->
                  <div class="col-lg-10">
                    <!-- .card -->
                    <div class="card card-fluid">
                      <h6 class="card-header"> Thông Tin Cá Nhân </h6><!-- .card-body -->
                      <div class="card-body">
                        <!-- .media -->
                         <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.taikhoan_admin.hosocanhan') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="media mb-3">
                              <!-- avatar -->
                              <div class="user-avatar user-avatar-xl fileinput-button">
                                <div class="fileinput-button-label"> Change photo </div>
                                  @if(!empty($taikhoan->hinhanh))
                                     <img class="d-block rounded" src="{{env('APP_URL').'/storage/app/'.$taikhoan->hinhanh}}" width="100" />
                                     
                                  @endif
                                <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $taikhoan->hinhanh }}" />
                              </div><!-- /avatar -->
                              <!-- .media-body -->
                              <div class="media-body pl-3">
                                <h3 class="card-title"> Ảnh Đại Diện</h3>
                               
                                
                              </div><!-- /.media-body -->
                            </div><!-- /.media -->
                            <div class="form-row">
                             
                                <label for="name" class="col-md-2">Họ và tên </label>
                                <div class="col-md-10 mb-3">
                                  <div class="custom-file">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $taikhoan->name }}" required />
                                    @error('name')
                                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                             
                                <label for="email" class="col-md-2">Email </label>
                                <div class="col-md-10 mb-3">
                                  <div class="custom-file">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $taikhoan->email }}" required />
                                    @error('email')
                                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                             
                                <label for="phone" class="col-md-2">Điện Thoại </label>
                                <div class="col-md-10 mb-3">
                                  <div class="custom-file">
                                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $taikhoan->phone }}" required />
                                    @error('phone')
                                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                             
                                <label for="phone" class="col-md-2">Địa Chỉ </label>
                                <div class="col-md-2 mb-3">
                                  <div class="custom-file">
                                    <select class="custom-select d-block w-100 @error('tinh_id') is-invalid @enderror" id="tinh_id" name="tinh_id" required>
                                    <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                                     @foreach($tinh as $value)
                                        <option value="{{ $value->id }}" {{ ($taikhoan->xa->huyen->tinh_id == $value->id) ? 'selected' : '' }}>{{ $value->tentinh }}</option>
                                     @endforeach
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn tỉnh/thành phố . </div>
                                   @error('tinh_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <div class="custom-file">
                                    <select class="custom-select d-block w-100 @error('huyen_id') is-invalid @enderror" id="huyen_id" name="huyen_id" required>
                                
                                      @foreach($huyen as $value)
                                        <option value="{{ $value->id }}" {{ ($taikhoan->xa->huyen_id == $value->id) ? 'selected' : '' }}>{{ $value->tenhuyen }}</option>
                                     @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn quận/huyện . </div>
                                     @error('huyen_id')
                                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                      @enderror
                                  </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                  <div class="custom-file">
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
                                </div>
                                <div class="col-md-4 mb-3">
                                  <div class="custom-file">
                                    <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ $taikhoan->tenduong }}" placeholder="Tên Đường/Số Nhà" required />
                              
                                    @error('tenduong')
                                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                             
                                <label for="username" class="col-md-2">Tên đăng nhập </label>
                                <div class="col-md-10 mb-3">
                                  <div class="custom-file">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $taikhoan->username }}" required />
                                      @error('username')
                                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                                      @enderror
                                  </div>
                                </div>
                            </div>
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
                          <hr>
                          <!-- .form-actions -->
                          <div class="form-actions">
                            <button type="submit" class="btn btn-primary ml-auto">Update Profile</button>
                          </div><!-- /.form-actions -->
                        </form><!-- /form -->
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <!-- .card -->
                   
                  </div><!-- /grid column -->
                </div><!-- /grid row -->
              </div><!-- /.page-section -->
            </div><!-- /.page-inner -->
          </div><!-- /.page -->
        </div>

@endsection
@section('javascript')
<script src="{{ asset('public/assets/javascript/main.min.js') }}"></script>

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