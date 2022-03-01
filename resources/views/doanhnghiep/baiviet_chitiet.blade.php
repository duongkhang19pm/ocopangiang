@extends('layouts.doanhnghiep')
@section('pagetitle')
  Chi Tiết Bài Viết
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
        <p class="text-muted"> {{ $taikhoan->doanhnghiep->tendoanhnghiep }} </p>
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
          
          <a class="nav-link " href="{{ route('doanhnghiep.hosocanhan',['id'=> Auth::user()->id]) }}">Hồ Sơ Cá Nhân</a>
          <a class="nav-link active" href="{{ route('doanhnghiep.baivietcanhan',['id'=> $taikhoan->id]) }}">Bài Viết Của Tôi </a> 

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
              <a href="{{ route('doanhnghiep.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
            </li>
          </ol>
        </nav>
   
      </header>
      <!-- .page-section -->
    
              <!-- .page-section -->
      <div class="page-section">
        <!-- grid row -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
    
              <li class="breadcrumb-item active"><i class="far fa-calendar-alt mr-2"></i>{{ Carbon\Carbon::parse($baiviet->ngaydang)->format('d/m/Y') }}</li>
              <li class="breadcrumb-item active"><i class="far fa-eye mr-2"></i>{{$baiviet->luotxem}} lượt</li>
            
          </ol>
        </nav>
        <h2>{{$baiviet->tieude}}</h2>
        <div class="blog__details__text">
            <?php echo ($baiviet->noidung); ?>
        </div>
      </div><!-- /.page-section -->
    </div>
   
  </div><!-- /.page -->
</div>


       

@endsection
@section('javascript')

@endsection