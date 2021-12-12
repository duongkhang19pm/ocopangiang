<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="author" content="AGChain Lab." />
  <meta name="theme-color" content="#3063A0" />
  <title>Đăng nhập - {{ config('app.short_name', 'Laravel') }}</title>
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/assets/apple-touch-icon.png') }}" />
  <link rel="shortcut icon" href="{{ asset('public/Image/logo.ico') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
  <link rel="stylesheet" href="{{ asset('public/assets/vendor/@fortawesome/fontawesome-pro/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme.min.css') }}" data-skin="default" />
  <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
  @yield('css')
  <link rel="stylesheet" href="{{ asset('public/assets/stylesheets/custom.css') }}" />
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    document.querySelector('html').classList.add('loading');
  </script>
</head>
<body>
<main class="auth auth-floated">
      <!-- form -->
       <form class="auth-form" method="post" action="{{ route('login') }}">
       @csrf
        <div class="mb-4">
          <div class="mb-3">
            <img class="rounded" src="{{ asset('public/Image/logo.png') }}" alt="" height="72"> </div>
          <h1 class="h3"> Đăng Nhập </h1>
        </div>
        <!-- .form-group -->
        <div class="form-group mb-4">
          <label class="d-block text-left" for="email">Tài khoản</label>
            <div class="position-relative">
               
                <input type="text" class="form-control form-control-lg{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email hoặc Tên đăng nhập" required />

                @if ($errors->has('email') || $errors->has('username'))
                  <span class="invalid-feedback">
                      <strong><i class="fa fa-exclamation-circle fa-fw"></i> 
                      {{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                    </strong>
                  </span>
                @endif
                
            </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group mb-4">
          <label class="d-block text-left d-flex justify-content-between" for="password"><span>Mật khẩu </span>
                          <a href="#matkhau" data-toggle="password">
                              <i class="fa fa-fw fa-eye"></i>
                              <span>Show</span>
                          </a>

                        </label>
        
          <input id="matkhau" type="password" class="form-control round @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group mb-4">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng Nhập</button>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="checkbox1">Duy trì đăng nhập</label>
          </div>
        </div>
        <!-- /.form-group -->
        <!-- recovery links -->
        <p class="py-3">
            <a href="{{ route('password.request') }}" class="link">Quên mật khẩu đăng nhập?</a>
          <span class="mx-2">·</span>
          <a href="{{ route('register') }}" class="link">Chưa Có Tài Khoản? Tạo tài khoản</a>
          
        </p>
        <!-- /recovery links -->
        <!-- copyright -->
        <p class="mb-0 px-3 text-muted text-center">
        Thiết kế và xây dựng bởi <a href="#" target="_blank">Dương Văn Khang </a>
      </form>

      <!-- /.auth-form -->
      <!-- .auth-announcement -->
     <div id="announcement" class="auth-announcement" style="background-image: url({{ asset('public/assets/images/img-1.png') }});">
      <div class="announcement-body">
        <h2 class="announcement-title">Hướng dẫn sử dụng phần mềm {{ config('app.short_name', 'Laravel') }}</h2>
        <a href="#huongdan" class="btn btn-warning"><i class="fa fa-fw fa-angle-right"></i> Xem tại đây</a>
      </div>
    </div>
</main>

<script src="{{ asset('public/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendor/particles.js/particles.min.js') }}"></script>
  <script>
    $(document).on('theme:init', () =>
    {
      particlesJS.load('announcement', '{{ asset('public/assets/javascript/pages/particles.json') }}');
    });
  </script>
  <script src="{{ asset('public/assets/javascript/theme.min.js') }}"></script>

</body>
</html>