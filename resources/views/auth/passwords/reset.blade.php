<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="author" content="AGChain Lab." />
  <meta name="theme-color" content="#3063A0" />
  <title>Đăng nhập - {{ config('app.short_name', 'Laravel') }}</title>
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/backend/apple-touch-icon.png') }}" />
  <link rel="shortcut icon" href="{{ asset('public/Image/logo.ico') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
  <link rel="stylesheet" href="{{ asset('public/backend/vendor/@fortawesome/fontawesome-pro/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme.min.css') }}" data-skin="default" />
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
  @yield('css')
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/custom.css') }}" />
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    document.querySelector('html').classList.add('loading');
  </script>
</head>
<body class="default-skin" style="position: relative; min-height: 100%; ">
    <main class="auth">
      <header id="auth-header" class="auth-header" style="background-image:url({{ asset('public/backend/images/img-1.png') }});">
        <h1>
                <img class="rounded" src="{{ asset('public/Image/logo.png') }}" alt="" height="90"> 
       
            
     
        </h1>
      </header><!-- form -->
      <form method="POST" action="{{ route('password.update') }}" class="auth-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Mật Khẩu Mới
               

                </label>

                <div class="col-md-8">
                    <a href="#matkhau" data-toggle="password"   class="float-right">
                        
                    <i class="fa fa-fw fa-eye mr-2"></i><span>Show</span>
                    </a>
                    <input id="matkhau"type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Nhập Lại Mật Khẩu

                </label>

                <div class="col-md-8">
                        <a href="#nhaplaimatkhau" data-toggle="password"   class="float-right">
                        
                        <i class="fa fa-fw fa-eye mr-2"></i><span>Show</span>
                        </a>
                    <input id="nhaplaimatkhau" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group ">
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        Đặt Lại Mật Khẩu
                    </button>
                </div>
            </div>
        </form>
     
      <!-- copyright -->
      <footer class="auth-footer">
      <p class="mb-0 px-3 text-muted text-center">
        Thiết kế và xây dựng bởi <a href="#" target="_blank">Dương Văn Khang </a>
      </footer>
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    
   
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-116692175-1');
    </script>
  

    <iframe frameborder="0" class="goog-te-menu-frame skiptranslate" title="Tiện ích dịch ngôn ngữ" style="visibility: visible; box-sizing: content-box; width: 890px; height: 274px; display: none;"></iframe>
    <iframe frameborder="0" class="goog-te-menu-frame skiptranslate" title="Tiện ích dịch ngôn ngữ" style="visibility: visible; box-sizing: content-box; width: 238px; height: 72px; display: none;"></iframe>
    <script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/particles.js/particles.min.js') }}"></script>
  <script>
    $(document).on('theme:init', () =>
    {
      particlesJS.load('auth-header', '{{ asset('public/backend/javascript/pages/particles.json') }}');
    });
  </script>
  <script src="{{ asset('public/backend/javascript/theme.min.js') }}"></script>
</body>

</html>
