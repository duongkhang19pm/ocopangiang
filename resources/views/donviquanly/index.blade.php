@extends('layouts.donviquanly')

@section('pagetitle')
	Đơn Vị Quản Lý  {{ Auth::user()->donviquanly->tendonviquanly }}
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
            <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span> <span class="d-block text-muted">Chào mừng bạn đến với đơn vị quản lý {{ Auth::user()->donviquanly->tendonviquanly }}.</span>
          </p>
    
        </div>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
          <!-- metric row -->
          <div class="metric-row">
            <div class="col-lg-8">
              <div class="metric-row metric-flush">
                <!-- metric column -->
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('donviquanly.doanhnghiep')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label">Doanh Nghiệp </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-fork"></i></sub> <span class="value">{{count($doanhnghiep)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('donviquanly.taikhoan_doanhnghiep')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Người Dùng Doanh Nghiệp </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-people"></i></sub> <span class="value">{{count($taikhoan)}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                
              </div>
            </div>
           
            
            <div class="col-lg-4">
              <!-- .metric -->
              <a href="{{route('donviquanly.baiviet')}}" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Bài Viết </h2>
                    <p class="metric-value h3">
                      <sub><i class="fas fa-book"></i></sub> <span class="value">{{count($baiviet)}}</span>
                    </p>
                  </a> <!-- /.metric -->
            </div>
            <!-- /metric column -->
          </div><!-- /metric row -->
        </div><!-- /.section-block -->
        <!-- grid row -->
        <div class="section-block">
               
          <canvas id="chart_donviquanly"></canvas>
        </div> 
      </div>
     
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div>



@endsection
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

 <script>
  $(function(){
      //get the pie chart canvas
      var dData = JSON.parse('<?php echo $doanhthu1; ?>');
      
 
 
      const data1 = {
        labels:dData.label ,
          datasets: [{
            label: 'Doanh Thu',
            data: dData.data ,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };
      const config = {
        type: 'bar',
        data: data1,
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
      };
      const chart_donviquanly = new Chart(
    document.getElementById('chart_donviquanly'),
    config
  );
      
 
  });
</script>

@endsection
