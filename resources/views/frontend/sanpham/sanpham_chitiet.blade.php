@extends('layouts.frontend')
@section('pagetitle')
    Sản Phẩm Chi Tiết
@endsection
@section('content')
@include('frontend.nav')
    @if(session('status'))
        <div id="thongbao" class="alert alert-success hide thongbao" role="alert">
            <span class="fas fa-check-circle"></span>
            <span class="msg">{!! session('status') !!}</span>           
        </div>    
    @endif
   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$sanpham->tensanpham}}</h2>
                        <div class="breadcrumb__option">
                            
                            <a href="./index.html">{{$nhomsanpham->tennhom}}</a>
                            <a href="./index.html">{{$loaisanpham->tenloai}}</a>
                            <span>{{$sanpham->tensanpham}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            @foreach($all_files as $image)

                                <img class="product__details__pic__item--large"
                                    src="{{ url($dir . $image['basename']) }}" height="500" alt="">
                                @break
                            @endforeach
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($all_files as $image)
                            <img data-imgbigurl="{{ url($dir . $image['basename']) }}"
                                src="{{ url($dir . $image['basename']) }}"width="100" height="150" alt="">
                            
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$sanpham->tensanpham}} </h3>
                        @guest
                                    @else
                                        @php
                                            $yeuthich = false;
                                        @endphp
                                        @foreach($sanphamyeuthich as $sp_yeuthich)
                                            @if($sp_yeuthich->sanpham_id == $sanpham->id)
                                                @php
                                                    $yeuthich = true;
                                                @endphp
                                                <a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" class="heart-icon"><i class="fas fa-heart text-danger"></i></a>

                                                @break
                                            @endif                                      
                                        @endforeach
                                        @if($yeuthich==false)
                                        <a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" class="heart-icon"><i class="far fa-heart"></i></a>
                                        @endif
                            @endguest
                            <a class="heart-icon"><i class="far fa-eye mr-2"></i><sup>{{$sanpham->luotxem}} </sup></a>

                        
                       
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
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                        <form method="get" action="{{ route('frontend.giohang.them.chitiet',['tensanpham_slug' => $sanpham->tensanpham_slug]) }}">
                            @csrf
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input name="qty" type="text" value="1" min="0" max="10">
                                        </div>
                                    </div>
                                </div>

                            <button type="submit" class="btn primary-btn">THÊM VÀO GIỎ HÀNG</button>
                          
                            
                        </form>
                        
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
                                    aria-selected="false">Đánh Giá Sản Phẩm ({{ $danhgia->count()}})</a>
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
                                     @foreach($sanpham->ChiTiet_PhanHang_SanPham as $ct)
                                    <div class="row">
                                        <div class="col-lg-4">
                                        <p> <strong> Phân Hạng OCOP </strong>
                                   
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
                                        </p>
                                        </div>
                                       <div class="col-lg-4">
                                            <p> <strong>Ngày Bắt Đầu:</strong>{{ Carbon\Carbon::parse($ct->ngaybatdau)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p> <strong>Ngày Kết Thúc:</strong>{{ Carbon\Carbon::parse($ct->ngayketthuc)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                 
                                    @endforeach
                                    <p> <strong>Mô Tả:</strong>   <?php echo ($sanpham->motasanpham); ?></p>
                                    

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                @foreach($danhgia as $value)
                                <div class="product__details__tab__desc">
                                    <div class="row mt-3">
                                        <div class="col-lg-2">
                                                @if(empty($value->taikhoan->hinhanh))
                                                   <img  src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="100" width="150" >
                                                @else
                                                  <img src="{{env('APP_URL').'/storage/app/'.$value->taikhoan->hinhanh  }}"height="90" width="100" />
                                                @endif
                                        </div>

                                        <div class="col-lg-10">
                                            <p> {{$value->taikhoan->name}}</p>
                                    
                                        </div>
                                    </div>
                                     <div class=" mt-3">
                                        <p>    <?php echo ($value->noidung); ?></p>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                             <p>  {{ Carbon\Carbon::parse( $value->created_at)->format('d/m/Y') }}</p>
                                            
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                                @endforeach
                                @if($sanpham->danhgia == 1)
                                <div class="product__details__tab__desc">
                                    <form  action="{{route('frontend.sanpham.danhgia',['tennhom_slug' => $nhomsanpham->tennhom_slug,'tenloai_slug' => $loaisanpham->tenloai_slug,'tensanpham_slug' => $sanpham->tensanpham_slug])}}" method="post" >
                                    @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea  class="form-control w-50 @error('noidung') is-invalid @enderror" name="noidung" id="noidung" cols="30" rows="9"
                                                    placeholder="Nội dung "></textarea>
                                                </div>
                                                @error('noidung')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div> 
                                           
                                        </div>
                                        @if(Auth::user() == null)
                                            <div class="form-group">
                                                <a href="{{route('khachhang.dangnhap')}}" class="site-btn" > Đăng Nhập Để Đánh Giá </a>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <button type="submit" class="site-btn" >Đánh Giá</button>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6  ><a href="{{route('frontend.doanhnghiep',['tendoanhnghiep_slug' => $sanpham->doanhnghiep->tendoanhnghiep_slug])}}">{{$sanpham->doanhnghiep->tendoanhnghiep}}</a></h6>
                                    @if(empty($value->hinhanh))
                                       <img  src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="100" width="150" >
                                    @else
                                      <img src="{{env('APP_URL').'/storage/app/'.$sanpham->doanhnghiep->hinhanh  }}"height="90" width="100" />
                                    @endif
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <p> <strong>Mã Số Thuế:</strong> {{$sanpham->doanhnghiep->masothue}}</p>
                                            <p> <strong>Địa Chỉ:</strong> {{ $sanpham->doanhnghiep->Xa->Huyen->Tinh->tentinh }} - {{ $sanpham->doanhnghiep->Xa->Huyen->tenhuyen }} - {{ $sanpham->doanhnghiep->Xa->tenxa }}  -  Đường:{{ $sanpham->doanhnghiep->tenduong }}</p>
                                             <p> <strong>Mô Hinh Kinh Doanh:</strong> {{$sanpham->doanhnghiep->mohinhkinhdoanh->tenmohinhkinhdoanh}}</p>
                                             <p> <strong>Loại Hinh Kinh Doanh:</strong> {{$sanpham->doanhnghiep->loaihinhkinhdoanh->tenloaihinhkinhdoanh}}</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <p> <strong>Email:</strong> {{$sanpham->doanhnghiep->email}}</p>
                                            <p> <strong>Điện Thoại:</strong> {{$sanpham->doanhnghiep->SDT}}</p>
                                            <p> <strong>Website:</strong><a href="{{$sanpham->doanhnghiep->website}}" target="_blank">{{$sanpham->doanhnghiep->website}}</a> </p>
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
               
                    @foreach($sanpham_lienquan as $value)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                               
                     
                                    <div class="product__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">
                                        <ul class="product__item__pic__hover">
                                            
                                            <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" ><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                
                               
                                <div class="product__item__text">
                                     <h6><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h6>
                                <h5> {{ number_format($value->dongia ) }}  <sup>VNĐ</sup></h5>
                                 @foreach($value->ChiTiet_PhanHang_SanPham as $ct)
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
                            </div>
                        </div>
                    @endforeach
              
            </div>
        </div>
    </section>

@endsection
@section('javascript')
  <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js' ) }}"></script>
@endsection