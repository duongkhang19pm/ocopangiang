<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="author" content="AGChain Lab." />
	<meta name="theme-color" content="#3063A0" />
	<title>503 - {{ config('app.short_name', 'Laravel') }}</title>
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/backend/apple-touch-icon.png') }}" />
	<link rel="shortcut icon" href="{{ asset('public/backend/favicon.ico') }}" />
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
	<main class="auth">
		<div class="empty-state">
			<div class="empty-state-container">
				<div class="card border border-primary">
					<div class="card-body">
						<div class="state-figure">
							<img class="img-fluid w-75" src="{{ asset('public/backend/images/503.png') }}" />
						</div>
						<h3 class="state-header">BẢO TRÌ HỆ THỐNG</h3>
						<p class="state-description">Hệ thống đang được nâng cấp & bảo trì! Xin vui lòng quay lại sau vài phút nữa.</p>
					</div>
				</div>
				<p class="text-muted small">Nếu bạn là quản trị hệ thống? <a href="{{ route('login') }}">Nhấn vào đây</a> để đăng nhập.</p>
			</div>
		</div>
	</main>
	
	<script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
	<script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/backend/javascript/theme.min.js') }}"></script>
</body>
</html>