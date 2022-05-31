@extends('layouts.frontend')
@section('pagetitle')
    Thống Kê
@endsection
@section('content')
@include('frontend.nav')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/frontend/assets/img/breadcrumb.jpg' ) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thống Kê</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('frontend')}}">Trang Chủ</a>
                        <span>Thống Kê</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                <div class="contact__widget">
                    <span><i class="fas fa-tag"></i></span>
                    <h4>{{count($sanpham)}} Sản Phẩm Đạt Chuẩn</h4>
                   
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                <div class="contact__widget">
                    <span><i class="fas fa-building"></i></span>
                    <h4>{{count($doanhnghiep)}} Doanh Nghiệp</h4>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                <div class="contact__widget">
                    <span> <i class="fas fa-check-circle"></i></span>
                    <h4>{{count($sanpham5sao)}} Sản Phẩm 5 Sao</h4>
                  
                </div>
            </div>
            
        </div>
        

    </div>
</section>

<section class="contact spad">
    <div class="container">
        <div  id="sanphamtheonhom" style="height: 370px; width: 100%;"></div>
    </div>
</section>
<section class="contact spad">
    <div class="container">
    <div class="product__details__text" id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
</section>
<section class="contact spad">
    <div class="container">
    <div class="product__details__text" id="sanphamduocyeuthich" style="height: 370px; width: 100%;"></div>
    </div>
</section>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function () {
        var dataPoints = JSON.parse('<?php echo json_encode($chart_data, JSON_NUMERIC_CHECK); ?>');
       
        
        
    var chart_theonhom = new CanvasJS.Chart("sanphamtheonhom", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        title:{
            text: " Sản Phẩm Ocop 5 Sao Theo Nhóm"
        },
       
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0",
            dataPoints: dataPoints
        }]
            
    });
    chart_theonhom.render();


    var doanhnghiep_sanpham = JSON.parse('<?php echo json_encode($chart_doanhnghiep_sanpham, JSON_NUMERIC_CHECK); ?>');
   
    
    var chart_doanhnghiep = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light2",
        title:{
            text: "Sản Phẩm Ocop 5 Sao Theo Doanh Nghiệp"
        },
       
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## sản phẩm",
            dataPoints: doanhnghiep_sanpham
        }]
    });
    chart_doanhnghiep.render();

        var sanpham_yeuthich = JSON.parse('<?php echo json_encode($chart_sanpham_yeuthich, JSON_NUMERIC_CHECK); ?>');
      
        var chart = new CanvasJS.Chart("sanphamduocyeuthich", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
                text: "Lượt Xem Sản Phẩm Ocop"
            },
           
            data: [{
                type: "bubble",
                toolTipContent: "<b>{name}</b><br><b>Lượt Xem: </b> {z} lượt<br><b>",
                dataPoints: sanpham_yeuthich
            }]
        });
        chart.render();
    
}    

</script>
@endsection