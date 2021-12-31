@extends('layouts.frontend')

@section('title', 'Đăng nhập')

@section('content')
@include('frontend.nav')
	<section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đăng Nhâp</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Đăng Nhâp</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<div class="main_content mt-4">
		<div class="login_register_wrap section">
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
	</div>

@endsection