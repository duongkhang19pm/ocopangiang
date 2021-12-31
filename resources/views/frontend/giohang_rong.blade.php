@extends('layouts.frontend')

@section('title', 'Giỏ hàng')

@section('content')
@include('frontend.nav')
	<section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ Hàng Rỗng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('frontend')}}">Trang Chủ</a>
                        <span>Giỏ Hàng Rỗng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
	
	<div class="main_content">
		<div class="section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="text-center order_complete">
							<img src="{{asset('public/Image/giorong.png')}}" class="w-50 h-50">
							<div class="heading_s1">
								<h3>Giỏ hàng chưa có sản phẩm!</h3>
							</div>
							<p>Giỏ hàng của bạn đang rỗng, xin hãy lấp đầy nó bằng việc duyệt qua các nông sản của cửa hàng
								và bỏ vào giỏ các nông sản mà bạn yêu thích và có ý định sẽ sở hữu nó.</p>
							<a href="{{ route('frontend') }}" class="btn btn-success btn-block">TIẾP TỤC MUA SẮM</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection