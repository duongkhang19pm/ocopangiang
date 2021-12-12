<link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.css') }}">

<link rel="shortcut icon" href="{{ asset('public/Image/logo.jpeg') }}" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('public/backend/css/app.css') }}">


<div id="auth">

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img src="{{ asset('public/Image/logo.png') }}" height="48" class='mb-4'>
                            <h3>Đăng Ký</h3>
                            <p>Vui lòng điền vào biểu mẫu để đăng ký.</p>
                        </div>
                          <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('Họ & Tên') }}</label>
                                        <input id="name" type="text" class="form-control round @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nhập họ và tên">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">{{ __('Địa Chỉ Email') }}</label>
                                        <input id="email" type="email" class="form-control round @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="Nhập địa chỉ email" >

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username-column">{{ __('Mật Khẩu') }}</label>
                                         <input id="password" type="password" class="form-control round @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nhập mật khẩu">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">{{ __('Xác Nhận Mật Khẩu') }}</label>
                                        <input id="password-confirm" type="password" class="form-control round" name="password_confirmation" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                               
                            </diV>

                            <a href="{{ route('login') }}">Bạn đã có tài khoản? Đăng Nhập</a>
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">  {{ __('Đăng ký') }}</button>
                            </div>
                        </form>
                        <div class="divider">
                            <div class="divider-text">OR</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i>
                                    Facebook</button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i>
                                    Github</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
 <script src="{{ asset('public/backend/js/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('public/backend/js/app.js') }}"></script>

<script src="{{ asset('public/backend/js/main.js') }}"></script>
