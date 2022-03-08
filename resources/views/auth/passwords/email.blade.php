
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
      <title>Quên Mật Khẩu - {{ config('app.name', 'Laravel') }}</title>
   
    <link rel="canonical" href="https://uselooper.com">
    <meta property="og:url" content="https://uselooper.com">
    <meta property="og:site_name" content="Looper - Bootstrap 4 Admin Theme">
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <!-- Favicons -->
     <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/backend/apple-touch-icon.png') }}" />
  <link rel="shortcut icon" href="{{ asset('public/Image/logo.ico') }}" />
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset('public/backend/vendor/@fortawesome/fontawesome-pro/css/all.min.css') }}" />
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme.min.css') }}" data-skin="default" />
    <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme-dark.min.css') }}" data-skin="dark" disabled="true"/>
    
     <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/custom.css') }}" />
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add loading class to html immediately
      document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
  </head>
  <body >
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .empty-state -->
    <main id="comingsoon" class="empty-state empty-state-fullpage bg-primary text-white" style="background-image: url({{ asset('public/backend/images/img-1.png')}});">
      <!-- .empty-state-container -->
      <div class="empty-state-container">
        <h1 class="state-header" style="letter-spacing: 4px;"> Đặt Lại Mật Khẩu</h1>
   
        <p class="state-description lead"> Bạn vui lòng nhập email vào để đặt lại mật khẩu . </p>
        @if(session('status'))
        <div id="thongbao" class="alert alert-success hide thongbao" role="alert">
            <span class="fas fa-check-circle"></span>
            <span class="msg">{!! session('status') !!}</span>           
        </div>    
    @endif
        <form  method="POST" action="{{ route('password.email') }}">
            @csrf
                     @error('email')
                        <div id="thongbao" class="alert alert-danger hide thongbao" role="alert">
                        
                            <span class="fas fa-exclamation-circle"></span>
                            <span class="msg">{{ $message }}</span>           
                        </div>
                        
                     @enderror
              <div class="form-group row">
                <div class="input-group bg-white border-white input-group-lg circle">
                    
                  <input type="email" class="form-control text-black @error('email') is-invalid @enderror" placeholder="Email của bạn"name="email" value="{{ old('email') }}" required >
                    
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-warning circle"><span class="d-none d-sm-inline">Subcribe</span> <span class="d-inline d-sm-none" aria-label="Subcribe"><i class="fa fa-arrow-circle-right"></i></span></button>
                  </div>
                </div>
              </div>
        </form>
        <div class="state-action">
          <a href="#" class="btn btn-reset"><i class="fab fa-fw fa-facebook"></i></a> 
          <a href="#" class="btn btn-reset"><i class="fab fa-fw fa-twitter"></i></a> 
          <a href="#" class="btn btn-reset"><i class="fab fa-fw fa-instagram"></i></a> 
          <a href="#" class="btn btn-reset"><i class="fab fa-fw fa-linkedin"></i></a>
        </div>
      </div><!-- /.empty-state-container -->
    <canvas class="particles-js-canvas-el" width="1898" height="460" style="width: 100%; height: 100%;"></canvas></main><!-- /.empty-state -->
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/particles.js/particles.min.js') }}"></script>
  <script>
    $(document).on('theme:init', () =>
    {
      particlesJS.load('comingsoon', '{{ asset('public/backend/javascript/pages/particles.json') }}');
    });
  </script>
  <script src="{{ asset('public/backend/javascript/theme.min.js') }}"></script>
  
</body>
</html>