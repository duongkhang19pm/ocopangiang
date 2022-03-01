<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="author" content="AGChain Lab." />
  <meta name="theme-color" content="#3063A0" />
  <title>@yield('pagetitle', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/assets/apple-touch-icon.png') }}" />
  <link rel="shortcut icon" href="{{ asset('public/Image/logo.ico') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" />
  <link rel="stylesheet" href="{{ asset('public/backend/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/backend/vendor/@fortawesome/fontawesome-pro/css/all.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/backend/vendor/flatpickr/flatpickr.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme.min.css') }}" data-skin="default" />
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/theme-dark.min.css') }}" data-skin="dark" />
  @yield('css')
  <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/custom.css') }}" />
  <script>
    var skin = localStorage.getItem('skin') || 'default';
    var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
    var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
    disabledSkinStylesheet.setAttribute('rel', '');
    disabledSkinStylesheet.setAttribute('disabled', true);
    if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
  </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.5/css/scroller.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/thongbao.css')}}">
  </head>
  <body>
    <!-- .app -->
    <div class="app">
        <header class="app-header app-header-dark">
      <div class="top-bar">
        <div class="top-bar-brand">
          <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
          <a href="{{ route('doanhnghiep.home') }}">
            <img src="{{ asset('public/Image/logo.png') }}" height="50" />
          </a>
        </div>
        <div class="top-bar-list">
          <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
            <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
          <div class="top-bar-item top-bar-item-full">
            <form class="top-bar-search">
              <div class="input-group input-group-search dropdown">
                <div class="input-group-prepend">
                  <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm" />
              </div>
            </form>
          </div>
          <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
            <ul class="header-nav nav">
              <li class="nav-item dropdown header-nav-dropdown">
                <a class="nav-link" href="#truycapnhanh" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="oi oi-grid-three-up"></span></a>
                <div class="dropdown-menu dropdown-menu-rich dropdown-menu-right">
                  <div class="dropdown-arrow"></div>
                  <div class="dropdown-sheets">
                    <div class="dropdown-sheet-item">
                      <a href="#" class="tile-wrapper">
                        <span class="tile tile-lg bg-indigo"><i class="oi oi-people"></i></span>
                        <span class="tile-peek">Hướng dẫn</span>
                      </a>
                    </div>
                    <div class="dropdown-sheet-item">
                      <a href="#" class="tile-wrapper">
                        <span class="tile tile-lg bg-teal"><i class="oi oi-fork"></i></span>
                        <span class="tile-peek">Yêu cầu trợ giúp</span>
                      </a>
                    </div>
                    <div class="dropdown-sheet-item">
                      <a href="#" class="tile-wrapper">
                        <span class="tile tile-lg bg-pink"><i class="fa fa-tasks"></i></span>
                        <span class="tile-peek">Biểu mẫu</span>
                      </a>
                    </div>
                    <div class="dropdown-sheet-item">
                      <a href="#" class="tile-wrapper">
                        <span class="tile tile-lg bg-yellow"><i class="oi oi-fire"></i></span>
                        <span class="tile-peek">Văn bản</span>
                      </a>
                    </div>
                    <div class="dropdown-sheet-item">
                      <a href="#" class="tile-wrapper">
                        <span class="tile tile-lg bg-cyan"><i class="oi oi-document"></i></span>
                        <span class="tile-peek">Thông tin dự án</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            @auth
              <div class="dropdown d-none d-md-flex">
                <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="user-avatar user-avatar-md">
                    @if((Auth::user()->hinhanh)==null)
                     <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" >
                    @else
                    <img src="{{env('APP_URL').'/storage/app/'.Auth::user()->hinhanh  }}" />
                    @endif
                  </span>
                  <span class="account-summary pr-lg-4 d-none d-lg-block">
                    <span class="account-name">{{ Auth::user()->name }}</span>
                    <span class="account-description">Quyền hạn: {{ Auth::user()->privilege }}</span>
                  </span>
                </button>
                <div class="dropdown-menu">
                  <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                  <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                  <h6 class="dropdown-header d-none d-md-block d-lg-none">{{ Auth::user()->name }}</h6>
                  <a class="dropdown-item" href="{{ route('doanhnghiep.hosocanhan',['id'=> Auth::user()->id]) }}"><span class="dropdown-icon oi oi-person"></span> Hồ Sơ Cá Nhân</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="dropdown-icon oi oi-account-logout"></span> Đăng xuất hệ thống</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">{{ csrf_field() }}</form>
                </div>
              </div>
            @endauth
          </div>
        </div>
      </div>
    </header>
    
      <!-- .app-aside -->
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
        @guest

        @else
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
              <span class="user-avatar user-avatar-lg">
                @if((Auth::user()->hinhanh)==null)
                     <img src="{{env('APP_URL').'/public/Image/noimage.png'}}" >
                    @else
                    <img src="{{env('APP_URL').'/storage/app/'.Auth::user()->hinhanh  }}" />
                    @endif
              </span>
              <span class="account-icon">
                <span class="fa fa-caret-down fa-lg"></span>
              </span>
              <span class="account-summary">
                <span class="account-name">{{ Auth::user()->name }}</span>
          
              </span>
            </button>
            <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="{{ route('doanhnghiep.hosocanhan',['id'=> Auth::user()->id]) }}">
                  <span class="dropdown-icon oi oi-person"></span> Hồ Sơ Cá Nhân</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                  @csrf
                  </form>
                
              </div>
              <!-- /dropdown-items -->
            </div>
           
            <!-- /.dropdown-aside -->
          </header>
           @endguest
          <!-- /.aside-header -->
          <!-- .aside-menu -->
         <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
              <ul class="menu">
                <!-- .menu-item -->
                <li class="menu-item has-active">
                  <a href="{{route('doanhnghiep.home')}}" class="menu-link">
                    <span class="menu-icon fas fa-home"></span>
                    <span class="menu-text">Trang Chủ </span>
                  </a>
                </li>
                <!-- /.menu-item -->
                @guest
                    @if (Route::has('login'))
                       <li class="sidebar-item  has-sub">
                            <a class="menu-link" href="{{ route('login') }}">
                                
                                <span class="menu-text"> Đăng nhập</span>
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                       <li class="sidebar-item  has-sub">
                            <a class="menu-link" href="{{ route('register') }}" >Đăng ký</a>
                        </li>
                    @endif
               @else
               
                <li class="menu-header">Doanh Mục</li>
               
 
 

                <li class="menu-item">
                  <a href="{{route('doanhnghiep.sanpham')}}" class="menu-link"><span class="menu-icon fab fa-product-hunt"></span> <span class="menu-text">Sản Phẩm</span></a>
                </li>
                 <li class="menu-item">
                  <a href="{{route('doanhnghiep.donhang')}}" class="menu-link"><span class="menu-icon fas fa-file-invoice-dollar"></span> <span class="menu-text">Thông Tin Đơn Hàng</span></a>
                </li>
               
                <li class="menu-item">
                  <a href="{{route('doanhnghiep.baiviet')}}" class="menu-link"><span class="menu-icon fas fa-book"></span> <span class="menu-text">Bài Viết</span></a>
                </li>


                <li class="menu-header">Thống Kê</li>
                <li class="menu-item">
                  <a href="{{route('doanhnghiep.donhang.doanhthu')}}" class="menu-link"><span class="menu-icon fas fa-signal"></span> <span class="menu-text">Doanh Thu</span></a>
                </li>
                
 
 

                 @endguest
                 
                <!-- /.menu-item -->
              </ul>
              <!-- /.menu -->
            </nav>
            <!-- /.stacked-menu -->
          </div>
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin">
              <span class="d-compact-menu-none">Chế độ ban đêm</span> <i class="fas fa-moon ml-1"></i>
            </button>
          </footer>
          <!-- /.aside-menu -->
        </div>
        <!-- /.aside-content -->
      </aside>
      <!-- /.app-aside -->
      <!-- .app-main -->
      <main class="app-main">
      <div class="wrapper">
        @yield('content')
      </div>
      
      <footer class="app-footer">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a class="text-muted" href="#">Hỗ trợ</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted" href="#">Hướng dẫn sử dụng</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted" href="#">Thông tin phần mềm</a>
          </li>
        </ul>
        <div class="copyright">Bản quyền &copy {{ @date("Y") }}. Thiết kế và xây dựng bởi <a href="#" target="_blank">Dương Văn Khang</div>
      </footer>
    </main>
      <!-- /.app-main -->
    </div>
    <script src="{{ asset('public/backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/pace-progress/pace.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ asset('public/backend/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('public/backend/javascript/theme.min.js') }}"></script>
  <script src="{{ asset('public/backend/javascript/main.min.js') }}"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <script>
    
    $(document).ready(function() {
    $('#table_id').DataTable( {
       
      "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tất cả"]],
        "iDisplayLength": 10,
        "oLanguage": {
          "sLengthMenu": "Hiện _MENU_ dòng",
          "oPaginate": {
            "sFirst": "<i class='fas fa-step-backward'></i>",
            "sLast": "<i class='fas fa-step-forward'></i>",
            "sNext": "<i class='fas fa-chevron-right'></i>",
            "sPrevious": "<i class='fas fa-chevron-left'></i>"
          },
          "sEmptyTable": "Không có dữ liệu",
          "sSearch": "Tìm kiếm:",
          "sZeroRecords": "Không có dữ liệu",
          "sInfo": "Hiện từ _START_ đến _END_ của _TOTAL_ dòng",
          "sInfoEmpty" : "Không tìm thấy",
          "sInfoFiltered": " (tổng số _MAX_ dòng)"
        }
        
    } );
    
} );
  </script>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
  <script>

        $(document).ready(function() {
            $('.thongbao').addClass("show");
           $('.thongbao').addClass("showAlert");
           $('.thongbao').removeClass('hide');
            $('.thongbao').delay(3000).slideUp(500);
        });
    </script>
  @yield('javascript')
  </body>
</html>