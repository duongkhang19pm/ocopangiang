@extends('layouts.frontend')

@section('pagetitle')
	Quản trị hệ thống
@endsection

@section('content')
@include('frontend.nav')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
  <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$taikhoan->name}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('frontend')}}">Trang Chủ</a>
                        <span>{{$taikhoan->name}}</span>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>
 <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @foreach($sanpham->hinhanh as $image)
                            <img class="product__details__pic__item--large"
                                src="{{ $hinhanh_first[$image->id] }}" height="500" alt="">
                                @break
                            @endforeach
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($sanpham->hinhanh as $image)
                            <img data-imgbigurl="{{env('APP_URL').'/storage/app/'.$image->thumuc.'/'.$image->hinhanh  }}"
                                src="{{env('APP_URL').'/storage/app/'.$image->thumuc.'/'.$image->hinhanh  }}"width="100" height="150" alt="">
                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$sanpham->tensanpham}}</h3>
                        <div class="product__details__rating">
                            @foreach($sanpham->ChiTiet_PhanHang_SanPham as $ct)
                                @if( $ct->phanhang_id  == 1)
                                    <span class="fa fa-star " style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                @endif
                                @if( $ct->phanhang_id  == 2)
                                    <span class="fa fa-star " style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                @endif
                                @if( $ct->phanhang_id  == 3)
                                    <span class="fa fa-star " style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                @endif
                                @if( $ct->phanhang_id  == 4)
                                    <span class="fa fa-star " style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:SlateGray"></span>
                                @endif
                                @if( $ct->phanhang_id  == 5)
                                    <span class="fa fa-star " style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                    <span class="fa fa-star"style="color:Gold"></span>
                                @endif
                            @endforeach
                           
                        </div>
                        <div class="product__details__price">{{ number_format($sanpham->dongia ) }} <sup>VNĐ</sup></div>
                         <ul>
                            <li><b>Nhóm Sản Phẩm</b> <span>{{$nhomsanpham->tennhom}}</span></li>
                            <li><b>Loại Sản Phẩm</b> <span>{{$loaisanpham->tenloai}} </span></li>
                            <li><b>Đơn Vị Tính</b> <span>{{$sanpham->quycach->donvitinh->tendonvitinh}}</span></li>
                            <li><b>Quy Cách Đóng Gói</b> <span>{{$sanpham->quycach->tenquycach}}</span></li>
                            <li><b>Khối Lượng Riêng</b> <span>{{$sanpham->khoiluongrieng}}</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" onclick=" confirm('Đã thêm sản phẩm {{$sanpham->tensanpham}} vào giỏ hàng của mình')" class="primary-btn">THÊM VÀO GIỎ HÀNG</a>
                       
                       
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Thông Tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Phân Hạng OCOP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Doanh Nghiệp</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{$sanpham->tensanpham}}</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p> <strong>Nguyên Liệu:</strong> {{$sanpham->nguyenlieu}}</p>
                                            
                                             <p> <strong>Hạn Sử Dụng:</strong> {{$sanpham->hansudung}}</p>
                                             <p> <strong>Hạn Sử Dụng Sau Khi Mở Hộp:</strong> {{$sanpham->hansudungsaumohop}}</p>
                                        </div>
                                        <div class="col-lg-6">
                                             <p> <strong>Tiêu Chuẩn:</strong> {{$sanpham->tieuchuan}}</p>
                                             <p> <strong>Điều Kiện Vận Chuyển:</strong> {{$sanpham->dieukienvanchuyen ?? 'N/A'}}</p>
                                            <p> <strong>Điều Kiện Lưu Trữ:</strong> {{$sanpham->dieukienluutru ?? 'N/A'}}</p>
                                        </div>
                                    </div>
                                    <p> <strong>Mô Tả:</strong>   <?php echo ($sanpham->motasanpham); ?></p>
                                    

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                     @foreach($sanpham->ChiTiet_PhanHang_SanPham as $ct)
                                    <h6>Phân Hạng OCOP 
                                   
                                         @if( $ct->phanhang_id  == 1)
                                            <span class="rating has-readonly">
                                                <label >
                                                    <span class="fa fa-star "></span>
                                                </label>
                                                <label >
                                                    <span class="fa fa-star"></span>
                                                </label>
                                                <label >
                                                    <span class="fa fa-star"></span>
                                                </label>

                                                <label >
                                                    <span class="fa fa-star"></span>
                                                </label>

                                                <label >
                                                    <span class="fa fa-star"style="color:Gold"></span>
                                                </label>

                                            </span>
                                        @endif
                                @if( $ct->phanhang_id  == 2)
                                    <span class="rating has-readonly">
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                    </span>
                                @endif
                                @if( $ct->phanhang_id  == 3)
                                    <span class="rating has-readonly">
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                    </span>
                                @endif
                                @if( $ct->phanhang_id  == 4)
                                    <span class="rating has-readonly">
                                        <label >
                                            <span class="fa fa-star"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                    </span>
                                @endif
                                @if( $ct->phanhang_id  == 5)
                                    <span class="rating has-readonly">
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>
                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                        <label >
                                            <span class="fa fa-star"style="color:Gold"></span>
                                        </label>

                                    </span>
                                @endif
                                </h6>
                                     <div class="row">
                                        <div class="col-lg-6">
                                            <p> <strong>Ngày Bắt Đầu:</strong>{{ Carbon\Carbon::parse($ct->ngaybatdau)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p> <strong>Ngày Kết Thúc:</strong>{{ Carbon\Carbon::parse($ct->ngayketthuc)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                 
                                    @endforeach
                                     
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>{{$sanpham->doanhnghiep->tendoanhnghiep}}</h6>
                                    @if(empty($value->hinhanh))
                                       <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="100" width="150" >
                                    @else
                                      <img src="{{env('APP_URL').'/storage/app/'.$sanpham->doanhnghiep->hinhanh  }}"height="90" width="100" />
                                    @endif
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <p> <strong>Mã Số Thuế:</strong> {{$sanpham->doanhnghiep->masothue}}</p>
                                            <p> <strong>Địa Chỉ:</strong> {{ $sanpham->doanhnghiep->Tinh->tentinh }} - {{ $sanpham->doanhnghiep->Huyen->tenhuyen }} - {{ $sanpham->doanhnghiep->Xa->tenxa }}  -  Đường:{{ $sanpham->doanhnghiep->tenduong }}</p>
                                             <p> <strong>Mô Hinh Kinh Doanh:</strong> {{$sanpham->doanhnghiep->mohinhkinhdoanh->tenmohinhkinhdoanh}}</p>
                                             <p> <strong>Loại Hinh Kinh Doanh:</strong> {{$sanpham->doanhnghiep->loaihinhkinhdoanh->tenloaihinhkinhdoanh}}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p> <strong>Email:</strong> {{$sanpham->doanhnghiep->email}}</p>
                                            <p> <strong>Điện Thoại:</strong> {{$sanpham->doanhnghiep->SDT}}</p>
                                            <p> <strong>Website:</strong> {{$sanpham->doanhnghiep->website}}</p>
                                            <p> <strong>Ngày Thành Lập:</strong> {{ Carbon\Carbon::parse( $sanpham->doanhnghiep->ngaythanhlap)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <p> <strong>Giới Thiệu:</strong>   <?php echo ($sanpham->doanhnghiep->gioithieu); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản Phẩm Liên Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($loai as $loai_sanpham)
                    @foreach($loai_sanpham->sanpham as $value)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                @foreach($value->hinhanh as $image)
                     
                                    <div class="product__item__pic set-bg" data-setbg="{{ $hinhanh_first[$image->id] }}">
                                        <ul class="product__item__pic__hover">
                                            
                                            <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" onclick=" confirm('Đã thêm sản phẩm {{$value->tensanpham}} vào giỏ hàng của mình')"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                     @break
                               @endforeach
                               
                                <div class="product__item__text">
                                    <h6><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h6>
                                    <h5>{{ number_format($value->dongia ) }} <sup>VNĐ</sup></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection