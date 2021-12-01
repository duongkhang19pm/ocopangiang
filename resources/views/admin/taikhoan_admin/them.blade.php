@extends('layouts.app')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm tài khoản quản lý </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.taikhoan_admin.them') }}" method="post">
                  @csrf
                  <!-- .form-group -->
                  <div class="form-group">
                      <label for="name">Họ và tên <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
                      @error('name')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="username">Tên đăng nhập <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required />
                      @error('username')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                      @error('email')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="phone">Điện Thoại <abbr title="Bắt buộc nhập">*</abbr></label>
                      <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required />
                      @error('phone')
                        <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                      @enderror
                    </div>

                    <div class="form-group">
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
                    <div class="form-group">
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
@endsection