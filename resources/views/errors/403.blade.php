<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="author" content="AGChain Lab." />
	<meta name="theme-color" content="#3063A0" />
	<title>403 - {{ config('app.short_name', 'Laravel') }}</title>
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/assets/apple-touch-icon.png') }}" />
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
<body>
	<main class="empty-state empty-state-fullpage bg-black">
		<div class="empty-state-container">
			<div class="card">
				<div class="card-header bg-light text-left">
					<i class="fa fa-fw fa-circle text-red"></i>
					<i class="fa fa-fw fa-circle text-yellow"></i>
					<i class="fa fa-fw fa-circle text-teal"></i>
				</div>
				<div class="card-body">
					<div class="state-figure">
						<img class="img-fluid" src="{{ asset('public/backend/images/403.svg') }}" style="max-width:300px;" />
					</div>
					<h3 class="state-header">Lỗi 403 - Cấm truy cập!</h3>
					<p class="state-description lead">{{session('error_message') }}</p>
					<div class="state-action">
						<a href="#quaylai" onclick="window.history.back();" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Quay lại trang trước</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
	<script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/backend/javascript/theme.min.js') }}"></script>
</body>
</html>