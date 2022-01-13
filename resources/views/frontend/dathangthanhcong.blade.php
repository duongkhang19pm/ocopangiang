@extends('layouts.frontend')
@section('pagetitle')
	Đặt Hàng Thành Công
@endsection
@section('content')
@include('frontend.nav')
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán Thành Công</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Thanh Toán Thành Công</span>
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
							<img src="{{ asset('public/Image/dat-hang-thanh-cong.jpg')}}" class="w-50 h-50">
							<div class="heading_s1">
								<h3>Bạn đã đặt hàng thành công!</h3>
							</div>
							<p>Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đang được xử lý và sẽ hoàn thành trong vòng 3-6 giờ. Bạn sẽ nhận được một email xác nhận khi đơn đặt hàng của bạn được hoàn thành.</p>
							<a href="{{ route('frontend') }}"class="btn btn-success btn-block">TIẾP TỤC MUA SẮM</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    @endsection