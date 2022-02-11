@extends('layouts.admin')

@section('pagetitle')
	Quản trị hệ thống
@endsection

@section('content')
<div class="wrapper">
  <!-- .page -->
  <div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <div class="d-flex flex-column flex-md-row">
          <p class="lead">
            <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span> <span class="d-block text-muted">Chào mừng bạn đến với trang quản trị viên.</span>
          </p>
    
        </div>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <!-- metric row -->
          <div class="metric-row">
            <div class="col-lg-9">
              <div class="metric-row metric-flush">
                <!-- metric column -->
                <div class="col">
                  <!-- .metric -->
                  <a href="user-teams.html" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Người Dùng Quản Trị </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-people"></i></sub> <span class="value">{{count($taikhoan_quanly)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>

                <div class="col">
                  <!-- .metric -->
                  <a href="user-teams.html" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label">Người Dùng Cán Bộ Đơn Vị Quản Lý </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-people"></i></sub> <span class="value">{{count($taikhoan_donvi)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div><!-- /metric column -->
                <!-- metric column -->
                 <div class="col">
                  <!-- .metric -->
                  <a href="user-teams.html" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label">Người Dùng Khách Hàng</h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-people"></i></sub> <span class="value">{{count($taikhoan_khachhang)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
              </div>
            </div>
           
             <div class="col-lg-3">
              <!-- .metric -->
             <a href="{{route('admin.donviquanly')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Đơn Vị Quản Lý </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-fork"></i></sub> <span class="value">{{count($donviquanly)}}</span>
                    </p>
                  </a><!-- /.metric -->
            </div><!-- metric column -->
            <div class="col-lg-3">
              <!-- .metric -->
              <a href="user-tasks.html" class="metric metric-bordered">
                <div class="metric-badge">
                  <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> ONGOING TASKS</span>
                </div>
                <p class="metric-value h3">
                  <sub><i class="oi oi-timer"></i></sub> <span class="value">8</span>
                </p>
              </a> <!-- /.metric -->
            </div>
            <!-- /metric column -->
          </div><!-- /metric row -->
        </div><!-- /.section-block -->
        <!-- grid row -->
        
      </div>
     
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div>
@endsection