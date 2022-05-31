@extends('layouts.doanhnghiep')

@section('pagetitle')
	Doanh Nghiệp {{ Auth::user()->doanhnghiep->tendoanhnghiep }}
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
            <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span> <span class="d-block text-muted">Chào mừng bạn đến với doanh nghiệp {{ Auth::user()->doanhnghiep->tendoanhnghiep }}.</span>
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
                  <a href="{{route('doanhnghiep.sanpham.saphet')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Sản phẩm sắp hết </h2>
                    <p class="metric-value h3">
                      <sub><i class="fas fa-file-invoice-dollar"></i></sub> <span class="value">{{count($sanpham_saphet)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('doanhnghiep.donhang.moi')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Đơn Hàng Mới </h2>
                    <p class="metric-value h3">
                      <sub><i class="fas fa-file-invoice-dollar"></i></sub> <span class="value">{{count($donhang)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('doanhnghiep.sanpham')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label">Sản Phẩm </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-fork"></i></sub> <span class="value">{{count($sanpham)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('doanhnghiep.baiviet')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Bài Viết </h2>
                    <p class="metric-value h3">
                      <sub><i class="fas fa-book"></i></sub> <span class="value">{{count($baiviet)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
              </div>
            </div>
           
            
            <div class="col-lg-3">
              <!-- .metric -->
                <a href="{{route('doanhnghiep.donhang.ngay')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Doanh Thu Hôm Nay </h2>
                    <p class="metric-value h3">
                      <sub><i class="fas fa-chart-bar mr-2"></i></sub>
                       <span class="value">
                         @php $tongtien=0; @endphp
                          @foreach($doanhthuhomnay as $value)
                            @php $tongtien += $value->tongsoluongban * $value->dongia; @endphp
                          @endforeach
                          {{number_format($tongtien)}}<sup>VNĐ</sup>
                    </span>
                    </p>
                </a>
            </div>
            <!-- /metric column -->
          </div><!-- /metric row -->
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="container-fluid pt-4 px-4">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>

        </div>  
                
                        
            
      </div>
     
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div>
	
	
@endsection
@section('javascript')


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
  window.onload = function () {
    var dataPoints = JSON.parse('<?php echo json_encode($chart_data, JSON_NUMERIC_CHECK); ?>');
  var chart = new CanvasJS.Chart("chartContainer", {
    title: {
      text: "Doanh Thu"
    },
    axisY: {
      title: "thành tiền",
      suffix: " đ",
    },
    data: [{
      type: "line",
      yValueFormatString: "#,##0.## đ",
      dataPoints: dataPoints
    }]
  });
  chart.render();
  
  }
</script>


@endsection