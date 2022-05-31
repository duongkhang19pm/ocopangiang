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
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{ asset('public/Image/5.jpg') }}" class="d-block w-100 "  style ="height: 450px" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('public/Image/2.jpg') }}" class="d-block w-100 " style ="height: 450px"alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="{{ asset('public/Image/7.jpg') }}" class="d-block w-100 " style ="height: 450px"alt="...">
                            </div>
                        </div>
                        <div class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </div>
                        <div class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section Begin -->
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
               
                <div class="col-lg-12">
                    
                    <div class="product__details__pic">
                        
                        <div class="product__details__pic__item">
                            @foreach($doanhnghiep as $value)
                                
                                        <img class="product__details__pic__item--large"
                                            src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}" height="500" alt="">
                                            
                                    
                                @break
                            @endforeach
                        </div>
                            
                        
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($doanhnghiep as $value)
                            <img data-imgbigurl="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}"
                                src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}"height ="270px" width = "100%" alt="">
                            
                            @endforeach
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
            <div class="section-title from-blog__title">
                <a href="{{route('frontend.baiviet')}}"  class="primary-btn ">XEM NHIỀU HƠN</a>
            </div>
        </div>
       
    </section>
   

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
                                       
                                        <a href="{{route('frontend.donviquanly',['tendonviquanly_slug' => $value->tendonviquanly_slug])}}"></a>
                                        
                                    </div>
                                </div>
                                
                                  @else
                                  <div class="card bg-dark text-white categories__item set-bg">
                                    <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}" class="card-img" alt="..."  height ="270px" width = "100%">
                                    
                                </div>
                                <div class="card-img-overlay d-flex align-items-end ">
                                       
                                        <a class="btn btn-outline-success"href="{{route('frontend.donviquanly',['tendonviquanly_slug' => $value->tendonviquanly_slug])}}">{{$value->tendonviquanly}}</a>
                                        
                                    </div>
                                 
                                  
                                 
                                  @endif
                        
                    </div>
                    @endforeach
                  
                    
                   
                </div>

            </div>
        </div>
    </section>
     

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
       <script type="text/javascript">
           $(document).ready(function($) {
              var engine1 = new Bloodhound({
                  remote: {
                      url: "{{ route('search.tensanpham') }}?value=%QUERY%",
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
                               '<div class="list-group"><a class="list-group-item list-group-item-action list-group-item-light" style="width: 600px;">Không có kết quả phù hợp.</a></div>'
                            ],
                           header: [
                            '<div class="list-group  " ><li class="list-group-item list-group-item-action list-group-item-secondary">Sản phẩm gợi ý</li></div>'
                            ],
                            suggestion: function (data) {
                                return '<a href="http://127.0.0.1/ocopangiang/san-pham/' +  data.tennhom_slug+'/'+data.tenloai_slug+'/'+data.tensanpham_slug+ '" class="list-group-item list-group-item-action list-group-item-light" style="width: 600px;"><div class="row"><div class="col-md-2"><img src="http://localhost/ocopangiang/storage/app/'+ data.hinhanh +'" width="70" height="80" alt=""></div><div class="col-md-4"> ' + data.tensanpham + ' </br><small>'+data.dongia+' <sup>VNĐ</sup></small></div></div></a>';
                            }
                        }
                    }
              ]);
            });

      </script>
@endsection
@section('javascript')
  <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js' ) }}"></script>
@endsection