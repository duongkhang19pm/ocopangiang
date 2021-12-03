@extends('layouts.admin')
@section('content')
<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật tài khoản doanh nghiệp </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.taikhoan_doanhnghiep.sua',['id'=> $taikhoan->id]) }}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-4">
                    <label for="doanhnghiep_id">Doanh Nghiệp <abbr title="Bắt buộc nhập">*</abbr></label>
                    <select class="custom-select @error('doanhnghiep_id') is-invalid @enderror" id="doanhnghiep_id" name="doanhnghiep_id" required>
                      <option value="">-- Chọn --</option>
                      @foreach($doanhnghiep as $value)
                        <option value="{{ $value->id }}" {{ ($taikhoan->doanhnghiep_id == $value->id) ? 'selected' : '' }}>{{ $value->tendoanhnghiep }}</option>
                      @endforeach
                    </select>
                    @error('doanhnghiep_id')
                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                    @enderror
                  </div>
                   <div class="col-md-4">
                    <label for="chucvu_id">Chức Vụ <abbr title="Bắt buộc nhập">*</abbr></label>
                    <select class="custom-select @error('chucvu_id') is-invalid @enderror" id="chucvu_id" name="chucvu_id" required>
                      <option value="">-- Chọn --</option>
                      @foreach($chucvu as $value)
                        <option value="{{ $value->id }}" {{ ($taikhoan->chucvu_id == $value->id) ? 'selected' : '' }}>{{ $value->tenchucvu }}</option>
                      @endforeach
                    </select>
                    @error('chucvu_id')
                      <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                    @enderror
                  </div>
                 
                  <div class="col-md-4">
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

@endsection