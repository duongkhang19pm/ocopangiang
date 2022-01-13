@extends('layouts.frontend')
@section('pagetitle')
    Doanh Nghiệp
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$doanhnghiep->tendoanhnghiep}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>{{$doanhnghiep->tendoanhnghiep}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {!! session('status') !!}
        </div>
    @endif
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        
                        <div class="sidebar__item">
                            @if(empty($doanhnghiep->hinhanh))
                               <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="300" width="500" >
                            @else
                              <img src="{{env('APP_URL').'/storage/app/'.$doanhnghiep->hinhanh  }}"height="250" width="500" />
                            @endif
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài Viết</h4>
                            <div class="blog__sidebar__recent">
                                @if(($baiviet)->isempty())
                                        <h6>Chưa có bài viết</h6>
                                 @else
                                    @foreach($baiviet as $value)
                                    <a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img src="{{ asset('public/Image/logo.jpg') }}" width="80" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{$value->tieude}}</h6>
                                            <span><i class="far fa-calendar-alt mr-2"></i>{{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</span>
                                             <span><i class="far fa-eye mr-2"></i>{{$value->luotxem}}</span>
                                            
                                        </div>
                                    </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

                    
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sản phẩm </h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($doanhnghiep->SanPham as $value)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            @foreach($value->hinhanh as $image)
                                                <div class="product__discount__item__pic set-bg" data-setbg="{{ $hinhanh_first[$image->id] }}">
                                                    <ul class="product__item__pic__hover">
                                                        
                                                        <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" onclick=" confirm('Đã thêm sản phẩm {{$value->tensanpham}} vào giỏ hàng của mình')"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                 @break
                                            @endforeach
                                            
                                            <div class="product__discount__item__text">
                                             
                                                <h5><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h5>
                                                <div class="product__item__price">{{ number_format($value->dongia ) }} <sup>VNĐ</sup></div>
                                                <div class="product__item__price">
                                                @foreach($value->ChiTiet_PhanHang_SanPham as $ct)
                                                    @if( $ct->phanhang_id  == 1)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 2)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 3)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 4)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:SlateGray"></h5>
                                                    @endif
                                                    @if( $ct->phanhang_id  == 5)
                                                        <h5 class="fa fa-star " style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                        <h5 class="fa fa-star"style="color:Gold"></h5>
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section-title product__discount__title">
                            <h2>Thông Tin Doanh Nghiệp</h2>
                        </div>
                    <div class="row">

                           <div class="col-lg-12">
                                <div class="product__details__tab">
                                    <ul class="nav nav-tabs "   role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                                aria-selected="true">Thông Tin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                                aria-selected="false">Giới Thiệu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                                aria-selected="false">Vị Trí Trên Bản Đồ</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                            <div class="product__details__tab__desc">
                                                <h6>{{$doanhnghiep->tendoanhnghiep}}</h6>
                                               
                                                <div class="row mt-3">
                                                    <div class="col-lg-6">
                                                        <p> <strong>Mã Số Thuế:</strong> {{$doanhnghiep->masothue}}</p>
                                                        <p> <strong>Địa Chỉ:</strong> {{ $doanhnghiep->Tinh->tentinh }} - {{ $doanhnghiep->Huyen->tenhuyen }} - {{ $doanhnghiep->Xa->tenxa }}  -  Đường:{{ $doanhnghiep->tenduong }}</p>
                                                         <p> <strong>Mô Hinh Kinh Doanh:</strong> {{$doanhnghiep->mohinhkinhdoanh->tenmohinhkinhdoanh}}</p>
                                                         <p> <strong>Loại Hinh Kinh Doanh:</strong> {{$doanhnghiep->loaihinhkinhdoanh->tenloaihinhkinhdoanh}}</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p> <strong>Email:</strong> {{$doanhnghiep->email}}</p>
                                                        <p> <strong>Điện Thoại:</strong> {{$doanhnghiep->SDT}}</p>
                                                        <p> <strong >Website:</strong> <a href="{{$doanhnghiep->website}}" target="_blank">{{$doanhnghiep->website}}</a></p>
                                                        <p> <strong>Ngày Thành Lập:</strong> {{ Carbon\Carbon::parse( $doanhnghiep->ngaythanhlap)->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                                            <div class="product__details__tab__desc">
                                              <h6>Giới Thiệu</h6>
                                                 <p> <?php echo ($doanhnghiep->gioithieu); ?></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                                            <div class="product__details__tab__desc">
                                                 <h6>{{$doanhnghiep->tendoanhnghiep}}</h6>
                                                @if(empty($doanhnghiep->hinhanh))
                                                   <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="100" width="150" >
                                                @else
                                                  <img src="{{env('APP_URL').'/storage/app/'.$doanhnghiep->hinhanh  }}"height="90" width="100" />
                                                @endif
                                                <div class="row mt-3">
                                                    <div class="col-lg-6">
                                                        <p> <strong>Mã Số Thuế:</strong> {{$doanhnghiep->masothue}}</p>
                                                        <p> <strong>Địa Chỉ:</strong> {{ $doanhnghiep->Tinh->tentinh }} - {{ $doanhnghiep->Huyen->tenhuyen }} - {{ $doanhnghiep->Xa->tenxa }}  -  Đường:{{ $doanhnghiep->tenduong }}</p>
                                                         <p> <strong>Mô Hinh Kinh Doanh:</strong> {{$doanhnghiep->mohinhkinhdoanh->tenmohinhkinhdoanh}}</p>
                                                         <p> <strong>Loại Hinh Kinh Doanh:</strong> {{$doanhnghiep->loaihinhkinhdoanh->tenloaihinhkinhdoanh}}</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p> <strong>Email:</strong> {{$doanhnghiep->email}}</p>
                                                        <p> <strong>Điện Thoại:</strong> {{$doanhnghiep->SDT}}</p>
                                                        <p> <strong>Website:</strong> {{$doanhnghiep->website}}</p>
                                                        <p> <strong>Ngày Thành Lập:</strong> {{ Carbon\Carbon::parse( $doanhnghiep->ngaythanhlap)->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection