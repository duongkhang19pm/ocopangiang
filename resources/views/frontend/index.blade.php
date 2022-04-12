@extends('layouts.frontend')

@section('pagetitle')
	Trang Chủ
@endsection

@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Doanh Mục</span>
                        </div>
                        <ul>
                            @foreach($nhomsanpham as $value)
                                <li><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>$value->tennhom_slug])}}">{{$value->tennhom}}</a>
                                    

                                </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
               
                <div class="col-lg-9">
                    <div class="hero__search__form " style="width: 500px;">
                        <form  >
                       
                            <input type="search" name="q" class="search-input" style="width: 500px;" placeholder="Bạn tìm gì ..." >
                            
                            
                        </form>  
                                       
                    </div>
                    <div class="input-group-append" style="height: 50px;"> 
                        <span class="site-btn" id="basic-addon2"><i class="fas fa-search"></i></span>
                    </div>
                    <div class="hero__search">
                       
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 328 789 376</h5>
                                <span>Hỗ Trợ 24/7</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="hero__item set-bg "  data-setbg="{{ asset('public/Image/background1.jpg') }}" >
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
     
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/Image/dichvu.png') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'dich-vu'])}}">Dịch Vụ</a></h5>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/frontend/assets/img/categories/cat-4.jpg') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'do-uong'])}}">Đồ Uống</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/frontend/assets/img/categories/cat-3.jpg') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'nong-san'])}}">Nông Sản</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/Image/thaoduoc.png') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'thao-duoc'])}}">Thảo Dược</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/frontend/assets/img/categories/cat-5.jpg') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'thuc-pham'])}}">Thực Phẩm</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg " data-setbg="{{  asset('public/Image/tieudung.jpg') }}">
                            <h5><a href="{{route('frontend.sanpham.nhomsanpham',['tennhom_slug'=>'tieu-dung'])}}">Tiêu Dùng</a></h5>
                        </div>
                    </div>
                    
                  
                    
                   
                </div>
            </div>
        </div>
    </section>
    @if(session('status'))
        <div id="thongbao" class="alert alert-success hide thongbao" role="alert">
            <span class="fas fa-check-circle"></span>
            <span class="msg" >{!! session('status') !!}</span>           
        </div>    
    @endif
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản Phẩm OCOP</h2>
                    </div>
                  
                </div>
            </div>
            <div class="row featured__filter">
              
                    @foreach($sanpham as $value)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                        
                        <div class="featured__item">
                           
                            
                                <div class="featured__item__pic set-bg" data-setbg="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}">


                                    <ul class="featured__item__pic__hover">
                                    @guest
                                    @else
                                        @php
                                            $yeuthich = false;
                                        @endphp
                                        @foreach($sanphamyeuthich as $sp_yeuthich)
                                            @if($sp_yeuthich->sanpham_id == $value->id)
                                                @php
                                                    $yeuthich = true;
                                                @endphp
                                                <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart text-danger"></i></a></li>
                                                @break
                                            @endif                                      
                                        @endforeach
                                        @if($yeuthich==false)
                                            <li><a href="{{ route('frontend.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-heart "></i></a></li>
                                         @endif
                                    @endguest
                                        <li><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" ><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                             

                              
                            
                         
                            
                            <div class="featured__item__text">
                                 <h6><a href="{{ route('frontend.sanpham.chitiet', ['tennhom_slug' => $value->loaisanpham->nhomsanpham->tennhom_slug,'tenloai_slug' => $value->loaisanpham->tenloai_slug,'tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h6>
                                <h5>{{ number_format($value->dongia ) }} <sup>VNĐ</sup></h5>
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
             <div class="section-title from-blog__title">
                <a href="{{route('frontend.sanpham')}}"  class="primary-btn ">XEM NHIỀU HƠN</a>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/Image/banner1.jpg') }}"  alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/Image/banner2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
     <section class="categories mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Hợp Tác Với Doanh Nghiệp</h2>
                    </div>
                  
                </div>
            </div>
            <div class="row">
                 
                <div class="categories__slider owl-carousel">

                    @foreach($doanhnghiep as $value)
                     <div class="col-lg-3">
                         @if(empty($value->hinhanh) || $value->hinhanh == 'N/A')
                                 
                                    <div class="card bg-dark text-white categories__item set-bg">
                                        <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" class="card-img" alt="..."  height ="270px" width = "100%">
                                        <div class="card-img-overlay d-flex align-items-end ">
                                        
                                            <a class="btn btn-outline-success w-100"href="{{route('frontend.doanhnghiep',['tendoanhnghiep_slug' => $value->tendoanhnghiep_slug])}}">{{$value->tendoanhnghiep}}</a>
                                            
                                        </div>
                                    </div>
                                  @else
                                  <div class="card bg-dark text-white categories__item set-bg">
                                        <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}" class="card-img" alt="..."  height ="270px" width = "100%">
                                        <div class="card-img-overlay d-flex align-items-end ">
                                        
                                            <a class="btn btn-outline-success text-center"href="{{route('frontend.doanhnghiep',['tendoanhnghiep_slug' => $value->tendoanhnghiep_slug])}}">{{$value->tendoanhnghiep}}</a>
                                            
                                        </div>
                                    </div>
                                 
                                 
                                  @endif
                        
                    </div>
                    @endforeach
                  
                    
                   
                </div>

            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin Tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($baiviet as $value)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                @php
                                  $img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
                                @endphp
                                
                               
                                    <img src="{{ $img }}" alt=""  height="200">
                               
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</li>
                                    <li><i class="far fa-eye"></i> {{$value->luotxem}}</li>
                                </ul>
                                <h5><a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}">{{$value->tieude}}</a></h5>
                               
                            </div>
                        </div>
                    </div>
                @endforeach
                
               
            </div>
        </div>
       
    </section>
    <!-- Latest Product Section Begin -->
    <section class="categories mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Liên Kết Đơn Vị</h2>
                    </div>
                  
                </div>
            </div>
            <div class="row">
                 
                <div class="categories__slider owl-carousel">

                    @foreach($donviquanly as $value)
                     <div class="col-lg-3">
                         @if(empty($value->hinhanh)|| $value->hinhanh == 'N/A')
                                 <div class="card bg-dark text-white categories__item set-bg">
                                    <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" class="card-img" alt="..."  height ="270px" width = "100%">
                                    <div class="card-img-overlay d-flex align-items-end ">
                                       
                                        <a class="btn btn-outline-success"href="{{route('frontend.donviquanly',['tendonviquanly_slug' => $value->tendonviquanly_slug])}}">{{$value->tendonviquanly}}</a>
                                        
                                    </div>
                                </div>
                                
                                  @else
                                  <div class="card bg-dark text-white categories__item set-bg">
                                    <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}" class="card-img" alt="..."  height ="270px" width = "100%">
                                    <div class="card-img-overlay d-flex align-items-end ">
                                       
                                        <a class="btn btn-outline-success"href="{{route('frontend.donviquanly',['tendonviquanly_slug' => $value->tendonviquanly_slug])}}">{{$value->tendonviquanly}}</a>
                                        
                                    </div>
                                </div>
                                 
                                  
                                 
                                  @endif
                        
                    </div>
                    @endforeach
                  
                    
                   
                </div>

            </div>
        </div>
    </section>
     

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->

    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
       <script type="text/javascript">
           $(document).ready(function($) {
              var engine1 = new Bloodhound({
                  remote: {
                      url: 'http://127.0.0.1/ocopangiang/search/tensanpham?value=%QUERY%',
                      wildcard: '%QUERY%'
                  },
                  datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                  queryTokenizer: Bloodhound.tokenizers.whitespace
              });

              
              $(".search-input").typeahead({
                  hint: true,
                  highlight: true,
                  minLength: 1
                }, [
                    {
                        source: engine1.ttAdapter(),
                        name: 'sanpham-tensanpham',
                        display: function(data) {
                            
                            return data.tensanpham;

                        },
                       
                        templates: {

                            empty: [
                               '<div class="list-group"><a class="list-group-item list-group-item-action list-group-item-light" style="width: 500px;">Không có kết quả phù hợp.</a></div>'
                            ],
                           header: [
                            '<div class="list-group  " ><li class="list-group-item list-group-item-action list-group-item-secondary">Sản phẩm gợi ý</li></div>'
                            ],
                            suggestion: function (data) {
                                return '<a href="http://127.0.0.1/ocopangiang/san-pham/' +  data.tennhom_slug+'/'+data.tenloai_slug+'/'+data.tensanpham_slug+ '" class="list-group-item list-group-item-action list-group-item-light" style="width: 500px;"><div class="row"><div class="col-md-2"><img src="http://localhost/ocopangiang/storage/app/'+ data.hinhanh +'" width="70" height="80" alt=""></div><div class="col-md-4"> ' + data.tensanpham + ' </br><small>'+data.dongia+' <sup>VNĐ</sup></small></div></div></a>';
                            }
                        }
                    }
              ]);
            });

      </script>
@endsection