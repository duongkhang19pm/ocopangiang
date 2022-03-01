@extends('layouts.donviquanly')

@section('pagetitle')
	Đơn Vị Quản Lý  {{ Auth::user()->donviquanly->tendonviquanly }}
@endsection

@section('content')
<?php
 
$dataPoints1 = array(
	array("label"=> "2010", "y"=> 36.12),
	array("label"=> "2011", "y"=> 34.87),
	array("label"=> "2012", "y"=> 40.30),
	array("label"=> "2013", "y"=> 35.30),
	array("label"=> "2014", "y"=> 39.50),
	array("label"=> "2015", "y"=> 50.82),
	array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
	array("label"=> "2010", "y"=> 64.61),
	array("label"=> "2011", "y"=> 70.55),
	array("label"=> "2012", "y"=> 72.50),
	array("label"=> "2013", "y"=> 81.30),
	array("label"=> "2014", "y"=> 63.60),
	array("label"=> "2015", "y"=> 69.38),
	array("label"=> "2016", "y"=> 98.70)
);
$dataPoints3 = array(
	array("label"=> "2017", "y"=> 50.61),
	array("label"=> "2018", "y"=> 60.55),
	array("label"=> "2019", "y"=> 70.50)
);
	
?>
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
            <div class="col-lg-9">
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
                <div class="col">
                  <!-- .metric -->
                  <a href="{{route('donviquanly.baiviet')}}" class="metric metric-bordered align-items-center">
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
        <div class="container-fluid pt-4 px-4">
                <div>
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
