@extends('layouts.frontend')
@section('pagetitle')
    Tin Tức Chi Tiết
@endsection
@section('content')
@include('frontend.nav')
     <section class="blog-details-hero set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$bv->tieude}}</h2>
                        <ul>
                            <li>{{$bv->taikhoan->name}}</li>
                            <li><i class="far fa-calendar-alt mr-2"></i>{{ Carbon\Carbon::parse($bv->ngaydang)->format('d/m/Y') }}</li>
                            <li><i class="far fa-eye mr-2"></i>{{$bv->luotxem}} lượt</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                             <form action="{{route('frontend.baiviet.timkiem')}}">
                                 @csrf
                                <input type="text" name="key" placeholder="Bạn cần tìm tin tức gì ?">
                               <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Chủ Đề</h4>
                            <ul>
                                <li><a href="{{route('frontend.baiviet')}}">Tất Cả</a></li>
                                @foreach($chude as  $value)
                                     <li><a href="{{route('frontend.baiviet.chude',['tenchude_slug'=>$value->tenchude_slug])}}">{{$value->tenchude}}</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài Viết Mới Nhất</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($baivietnew as $value)
                                  @php
                                  $img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
                                @endphp
                                <a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                       <img src="{{ $img }}" width="80" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$value->tieude}}</h6>
                                        <span><i class="far fa-calendar-alt mr-2"></i>{{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</span>
                                         <span><i class="far fa-eye mr-2"></i>{{$value->luotxem}}</span>
                                        
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <?php echo ($bv->noidung); ?>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        @if(($bv->taikhoan->hinhanh)==null)
                                            <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" >
                                        @else
                                            <img src="{{env('APP_URL').'/storage/app/'.$bv->taikhoan->hinhanh  }}" />
                                        @endif
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$bv->taikhoan->name}} - {{$bv->taikhoan->donviquanly->tendonviquanly}} - {{$bv->taikhoan->doanhnghiep->tendoanhnghiep ?? 'N/A' }}</h6>
                                        <span>quyền hạn: {{$bv->taikhoan->privilege}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Chủ đề:</span> {{$bv->ChuDe->tenchude}}</li>
                                        
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-google-plus"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   

                </div>


            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
 <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Tin Tức Liên Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($baiviettheochude as $value)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                @php
                                  $img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
                                @endphp
                                <img src="{{ $img }}" alt="" height="200">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <span><i class="far fa-calendar-alt mr-2"></i>{{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</span>
                                    <span><i class="far fa-eye mr-2"></i>{{$value->luotxem}}</span>
                                </ul>
                                <h5><a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}">{{$value->tieude}}</a></h5>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
            </div>
        </div>
    </section>
    <!-- Related Blog Section Begin -->
   
   
@endsection

