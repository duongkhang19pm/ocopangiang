@extends('layouts.frontend')
@section('pagetitle')
    Tin Tức Tìm Kiếm
@endsection
@section('content')
@include('frontend.nav')
     <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' )}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tin Tức</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>Tin Tức</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="section-title product__discount__title">
                       @if($baiviet->isEmpty())
                        <h2 ><i class="far fa-lightbulb mr-2"></i>Xin lỗi , không tìm thấy kết quả nào cho từ khóa: <strong>'{{$key}}'</strong></h2>
                        @else
                         <h2 ><i class="far fa-lightbulb mr-2"></i>Kết quả tìm được cho từ khóa: <strong>'{{$key}}'</strong></h2>
                    </div>
                    <div class="row">

                        @foreach($baiviet as $value)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{ asset('public/Image/logo.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i>{{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</li>
                                            <li><i class="far fa-eye mr-2"></i>{{$value->luotxem}}</li>
                                        </ul>
                                        <h5><a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}">{{$value->tieude}}</a></h5>
                                        <p><?php echo Str::limit($value->tomtat, 120); ?></p>
                                        <a href="{{route('frontend.baiviet.chitiet',['tenchude_slug'=>$value->chude->tenchude_slug,'tieude_slug' => $value->tieude_slug])}}" class="blog__btn">XEM THÊM<span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       
                        
                        <div class="col-lg-12 text-center">
                            
                                {{$baiviet->links()}}
                                
                            
                        </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection

