@extends('layouts.admin')
@section('content')
<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật tài khoản cán bộ đơn vị </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.taikhoan_donviquanly.sua',['id'=> $taikhoan->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-3">
                          <label for="tinh">Tỉnh/Thành Phố
                            <abbr title="Required">*</abbr>
                          </label>
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
                      <div class="col-md-3">
                              <label for="huyen">Quận/Huyện
                                <abbr title="Required">*</abbr>
                              </label>
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
                  <div class="row">
                    <div class="col-md-6">
                    <label for="donviquanly_id">Đơn vị quản lý <abbr title="Bắt buộc nhập">*</abbr></label>
                    <select class="custom-select @error('donviquanly_id') is-invalid @enderror" id="donviquanly_id" name="donviquanly_id" required>
                      <option value="">-- Chọn --</option>
                      @foreach($donviquanly as $value)
                        <option value="{{ $value->id }}"{{ ($taikhoan->donviquanly_id == $value->id) ? 'selected' : '' }}>{{ $value->tendonviquanly }}</option>
                      @endforeach
                    </select>
                    @error('donviquanly_id')
                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                      <label for="name">Họ và tên <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $taikhoan->name }}" required />
                      @error('name')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                  </div>

                  <div class="row">
                    
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
                    <div class="col-md-4">
                      <label for="username">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $taikhoan->username }}" required />
                      @error('username')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                  </div>

                  
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
                  <!-- /.form-group -->

                  <!-- /.form-row -->
                  <hr class="mb-4">
                 
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Cập Nhật</button>
               
                  
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