@extends('layouts.frontend')
@section('pagetitle')
    Đơn Vị Quản Lý
@endsection
@section('content')
@include('frontend.nav')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$donviquanly->tendonviquanly}}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('frontend')}}">Trang Chủ</a>
                            <span>{{$donviquanly->tendonviquanly}}</span>
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
           
            @if(!empty($taikhoan))
            @if(($baiviet)->isNotEmpty())
            <div class="section-title product__discount__title text-center">
                <h2>Bài Viết</h2>
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
            @endif
            @endif
            
            <div class="section-title product__discount__title text-center">
                <h2>Thông Tin Đơn Vị Quản Lý</h2>
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
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                        <div class="row mt-3">
                                            <div class="col-lg-2">
                                                @if(empty($donviquanly->hinhanh)||$donviquanly->hinhanh == 'N/A')
                                                    <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="150" width="250"  >
                                                @else
                                                    <img src="{{env('APP_URL').'/storage/app/'.$donviquanly->hinhanh  }}"height="150" width="250" />
                                                @endif
                                            </div>
                                            <div class="col-lg-10 float-end ">
                                                <h6>{{$donviquanly->tendonviquanly}}</h6>
                                            </div>
                                            
                                        </div>
                                           
                                      
                                        <div class="row mt-3">
                                            <div class="col-lg-6">
                                                <p> <strong>Tên Thủ Trưởng:</strong> {{$donviquanly->tenthutruong}}</p>
                                                <p> <strong>Địa Chỉ: </strong>  {{ $donviquanly->tenduong }} -  {{ $donviquanly->Xa->tenxa }} - {{ $donviquanly->Xa->Huyen->tenhuyen }} - {{ $donviquanly->Xa->Huyen->Tinh->tentinh }}    </p>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <p> <strong>Email:</strong> {{$donviquanly->email}}</p>
                                                <p> <strong>Điện Thoại:</strong> {{$donviquanly->SDT}}</p>
                                                <p> <strong>Website:</strong> <a href="{{$donviquanly->website}}" target="_blank"><i class="fas fa-fw fa-link"></i>{{$donviquanly->website}}</a></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Giới Thiệu</h6>
                                            <p> <?php echo ($donviquanly->gioithieu); ?></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>





@endsection
