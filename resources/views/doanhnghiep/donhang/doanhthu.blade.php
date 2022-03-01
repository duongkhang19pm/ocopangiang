@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('doanhnghiep.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>

                </li>
                
              </ol>
            </nav>    
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Doanh Thu Của {{$doanhnghiep->tendoanhnghiep}}</h1>
                </div>
            <!-- /title and toolbar -->
        </header>
        @if(empty($doanhthu) == false )
        <div class="page-section">
          <!-- .card -->
          <section class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
              

                <!-- form .needs-validation -->
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.donhang.doanhthu') }}" method="get" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-5">
                              <label  id="inputGroupPrepend">Ngày bắt đầu</label>
                              <input type="date" class="form-control" id="validationCustomUsername" name="dateStart" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Vui lòng chọn ngày bắt đầu.
                                </div>  
                            
                        </div>
                         <div class="col-md-5">
                            <label  id="inputGroupPrepend">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="validationCustomUsername" name="dateEnd" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Vui lòng chọn ngày kết thúc 
                                </div>
                            
                        </div>
                        <div class="col-md-2 text-right">
                            
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Thống Kê</button>
                        </div>
                        
                        
                    </div>
                    
                
                  
                    

                </form>

                
              
            </div>


          </section>
            @if( $doanhthu->count() == null)
                <div class="alert alert-danger text-center" role="alert">
                    <p>Từ <strong>{{date('d-m-Y', strtotime($session_title_dateStart))}}</strong> đến <strong> {{date('d-m-Y', strtotime($session_title_dateEnd))}}</strong> </p>
                    <p> Doanh Nghiệp {{$doanhnghiep->tendoanhnghiep}} không có doanh thu </p>
                </div>
            @else

                <div class="page-section">
                <!-- .card -->
                    <section class="card card-fluid">
                      <!-- .card-body -->
                      <div class="card-body">
                        <div class="table-responsive">
                          <!-- .table -->
                          <h4 class="text-center">Doanh Thu của {{$doanhnghiep->tendoanhnghiep}} </h4>
                          <h4 class="text-center">từ <strong>{{date('d-m-Y', strtotime($session_title_dateStart))}}</strong> đến <strong> {{date('d-m-Y', strtotime($session_title_dateEnd))}}</strong></h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Tên Sản Phẩm</th>
                                        <th>Số Lượng Bán </th>
                                        <th>Đơn Giá</th>
                                        <th>Tổng Tiền</th>
                                        <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                    </tr>
                                </thead>
                            <tbody>
                                 @php $tong = 0; @endphp            
                                @foreach($doanhthu as $value)
                                        
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $value->tensanpham }}</td>
                                        <td class="align-middle">{{ $value->tongsoluongban }}</td>
                                        <td class="align-middle">{{ number_format($value->dongia) }} VNĐ</td>
                                        <td class="align-middle">{{ number_format($value->tongsoluongban * $value->dongia) }} VNĐ</td>
                                         @php $tong += $value->tongsoluongban * $value->dongia; @endphp
                                     </tr>
                                @endforeach
                                    <tr >
                                        <td colspan="4" class="fw-bold" >Tổng doanh thu</td>
                                        <td colspan="4" class="fw-bold">{{number_format( $tong) }} VNĐ</td>

                                    </tr>
                             </tbody>
                          </table>
                        
                          <!-- /.table -->
                        </div>
                         
                      </div>
                    </section>
               
                </div> 
            @endif
         
        </div>
        @else
        <div class="page-section">
          <!-- .card -->
          <section class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
         

                <!-- form .needs-validation -->
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.donhang.doanhthu') }}" method="get" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-5">
                             <label  id="inputGroupPrepend">Ngày bắt đầu</label>
                            <input type="date" class="form-control" id="validationCustomUsername" name="dateStart" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Vui lòng chọn ngày bắt đầu.
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                            <label  id="inputGroupPrepend">Ngày kết thúc</label>
                            <input type="date" class="form-control" id="validationCustomUsername" name="dateEnd" aria-describedby="inputGroupPrepend" required>
                            <div class="invalid-feedback">
                                Vui lòng chọn ngày kết thúc 
                            </div>
                        </div>

                     <div class="col-md-2 text-right">
                            
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Thống Kê</button>
                        </div>
                    </div>
                   
                  

                  

                </form>
               
              <!-- /form .needs-validation -->
        
            </div>
          </section>
           <div class="page-section">
                <!-- .card -->
                    <section class="card card-fluid">
                      <!-- .card-body -->
                      <div class="card-body">
                        <div class="table-responsive">
                          <!-- .table -->
                          <h4 class="text-center">Tổng Doanh Thu Của {{$doanhnghiep->tendoanhnghiep}}</h4>
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Tên Sản Phẩm</th>
                                        <th>Số Lượng Bán </th>
                                        <th>Đơn Giá</th>
                                        
                                        <th>Tổng Tiền</th>
                                        <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php $tong = 0; @endphp            
                                    @foreach($tongdoanhthu as $value)
                                            
                                        <tr>
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $value->tensanpham }}</td>
                                            <td class="align-middle">{{ $value->tongsoluongban }}</td>
                                            <td class="align-middle">{{ number_format($value->dongia) }} VNĐ</td>

                                            <td class="align-middle">{{ number_format($value->tongsoluongban * $value->dongia) }} VNĐ</td>
                                             @php $tong += $value->tongsoluongban * $value->dongia; @endphp
                                         </tr>
                                    @endforeach
                                        <tr >
                                            <td colspan="4" class="fw-bold" >Tổng doanh thu</td>
                                            <td colspan="4" class="fw-bold">{{number_format( $tong) }} VNĐ</td>

                                        </tr>
                                 </tbody>
                          </table>
                        
                          <!-- /.table -->
                        </div>
                         
                      </div>
                    </section>
               
                </div>     
          </div>
        </div>

        @endif
      </div>
    </div> 
</div> 

@endsection

@section('javascript')
<script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
@endsection
