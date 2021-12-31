@extends('layouts.frontend')

@section('title', 'Đăng ký')

@section('content')	
@include('frontend.nav')
	<div class="main_content">
		<div class="login_register_wrap section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-6 col-md-10">
						<div class="login_wrap">
							<div class="padding_eight_all bg-white">
								<div class="heading_s1">
									<h3 align= "center">Đăng ký tài khoản</h3>
									<hr>
								</div>
								<form action="{{ route('register') }}" method="post">
									@csrf
									<div class="form-group">
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Họ và tên *" required />
										@error('name')
											<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror
									</div>
									<div class="form-group">
										<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Địa chỉ Email *" required />
										@error('email')
											<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror
									</div>
									<div class="form-group">
										<input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Điện thoại *" required />
										@error('phone')
											<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu *" required />
										@error('password')
											<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Xác nhận mật khẩu *" required />
										@error('password_confirmation')
											<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
										@enderror
									</div>
									<div class="form-group form-check">
										<div class="chek-form">
											<div class="custome-checkbox">
												<input type="checkbox" class="form-check-input" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} />
												<label class="form-check-label" for="remember"><span>Tôi đồng ý với các điều khoản.</span></label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">ĐĂNG KÝ</button>
									</div>
								
									<div class="form-group text-center">
										<span >Hoặc</span>
									</div>
									<div class="form-group">								
										<a href="#" class="btn btn-danger btn-block"><i class="ion-social-googleplus"></i>Google</a>
									</div>
								</form>
								<div class="form-note text-center">Bạn đã có tài khoản? <a href="{{ route('khachhang.dangnhap') }}">Đăng nhập</a></div>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</div>
@endsection