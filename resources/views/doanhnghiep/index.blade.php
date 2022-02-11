@extends('layouts.doanhnghiep')

@section('pagetitle')
	Doanh Nghiệp {{ Auth::user()->doanhnghiep->tendoanhnghiep }}
@endsection

@section('content')
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active">
							<a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
						</li>
					</ol>
				</nav>
				<h1 class="page-title">Trang Doanh Nghiệp {{ Auth::user()->doanhnghiep->tendoanhnghiep }}</h1>
			</header>
			<div class="page-section">
				<h3>Trang chủ Doanh Nghiệp đang cập nhật!</h3>
			</div>
		</div>
	</div>
	
	
@endsection