@extends('layouts.donviquanly')
@section('pagetitle')
  Bài Viết Cá Nhân
@endsection
@section('content')
<div class="wrapper">
          <!-- .page -->
  <div class="page">
    <!-- .page-cover -->
    <header class="page-cover">
      <div class="text-center">
        <a href="user-profile.html" class="user-avatar user-avatar-xl">
         
          @if(empty($taikhoan->hinhanh))
            <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
          @else
            <img src="{{env('APP_URL').'/storage/app/'.$taikhoan->hinhanh  }}"height="90" width="100" />
          @endif
        </a>
        <h2 class="h4 mt-2 mb-0"> {{ Auth::user()->name }} </h2>
        <p class="text-muted"> {{ $taikhoan->donviquanly->tendonviquanly }} </p>
      </div><!-- .cover-controls -->
      
    </header>
    <!-- Followers Modal -->
    <!-- .modal -->
   
    <!-- /Following Modal -->
    <!-- .page-navs -->
    <nav class="page-navs">
      <!-- .nav-scroller -->
      <div class="nav-scroller">
        <!-- .nav -->
        <div class="nav nav-center nav-tabs">
          
          <a class="nav-link " href="{{ route('donviquanly.hosocanhan',['id'=> Auth::user()->id]) }}">Hồ Sơ Cá Nhân</a>
          <a class="nav-link active" href="{{ route('donviquanly.baivietcanhan',['id'=> $taikhoan->id]) }}">Bài Viết Của Tôi <small class="badge">{{count($baiviet)}}</small></a> 

        </div><!-- /.nav -->
      </div><!-- /.nav-scroller -->
    </nav><!-- /.page-navs -->
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="{{ route('donviquanly.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
          </ol>
        </nav>
   
      </header>
      <!-- .page-section -->
    
              <!-- .page-section -->
      <div class="page-section">
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
          @foreach($baiviet as $value)
          <div class="col-lg-6 col-xl-4">
            <!-- .card -->
            <div class="card card-fluid">
              <!-- .card-header -->
              <div class="card-header border-0">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-muted" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ngày Đăng"><span class="sr-only">Ngày Đăng</span> <i class="fa fa-calendar-alt text-muted mr-1"></i> {{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}</span>
                  <span class="badge bg-muted" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lượt Xem"><span class="sr-only">Lượt Xem</span> <i class="far fa-eye text-muted mr-1"></i> {{$value->luotxem}}</span>

                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    <div class="dropdown-menu dropdown-menu-right" style="">
                      <div class="dropdown-arrow"></div>
                        <a href="{{ route('donviquanly.baiviet_chitiet', ['id' => $value->id]) }}" class="dropdown-item">Xem Chi Tiết</a> 
                        <a href="{{ route('donviquanly.baiviet.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
                        <a href="{{ route('donviquanly.baiviet.xoa', ['id' => $value->id]) }}" class="dropdown-item">Xóa</a>
                    </div>
                  </div>
                </div>
              </div><!-- /.card-header -->
              <!-- .card-body -->
              <div class="card-body text-center">
                
                <!-- /.media -->
                <h5 class="card-title">
                  <a href="{{ route('donviquanly.baiviet_chitiet', ['id' => $value->id]) }}">{{$value->tieude}}</a>
                </h5>
                <p class="card-subtitle text-muted"> {{$value->chude->tenchude}} </p><!-- .my-3 -->
               
                <!-- grid row -->
               
              </div><!-- /.card-body -->

              <!-- .progress -->
              
            </div><!-- /.card -->
          </div><!-- /grid column -->
          <!-- grid column -->
         @endforeach
        </div><!-- /grid row -->
      </div><!-- /.page-section -->
    </div>
   
  </div><!-- /.page -->
</div>


       

@endsection
@section('javascript')

@endsection