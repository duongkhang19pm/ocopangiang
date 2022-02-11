@extends('layouts.donviquanly')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> </h1>
                </div>
            <!-- /title and toolbar -->
        </header>
        @if(empty($doanhthu) == true )
        
        <div class="page-section">
            
           <div class="page-section">
                <!-- .card -->
                    <section class="card card-fluid">
                      <!-- .card-body -->
                      <div class="card-body">
                        <div class="table-responsive">
                          <!-- .table -->
                          <h4 class="text-center">Tổng Doanh Thu</h4>
                            <div class="btn-toolbar">
                                <a type="button" href="{{ route('donviquanly.doanhthu.xuat') }}" class="btn btn-light" ><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a>
                            </div>
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Doanh Nghiệp</th>
                                       
                                        <th>Số Lượng</th>
                                        <th>Tổng Tiền</th>
                                        <th style="width:100px; min-width:100px;"> &nbsp; </th>
                                    </tr>
                                </thead>
                            <tbody>
                                 @php $tong = 0; @endphp            
                                @foreach($tongdoanhthu as $value)
                                        
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle" > <a href="{{ route('donviquanly.doanhnghiep.doanhthu_doanhnghiep', ['id' => $value->id]) }}">{{ $value->tendoanhnghiep }}</a></td>
                                        
                                        <td class="align-middle">{{ $value->tongsoluongban  }} sản phẩm</td>
                                        <td class="align-middle">{{ number_format($value->tongdongiaban)  }} VNĐ</td>
                                         @php $tong += $value->tongdongiaban ; @endphp
                                        <td class="align-middle text-right">
                                         <a href="{{ route('donviquanly.doanhnghiep.doanhthu_doanhnghiep', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
                                            <i class="fas fa-signal"></i>
                                            <span class="sr-only">DoanhThu</span>
                                          </a>
                                        </td>
                                     </tr>
                                @endforeach
                                    <tr >
                                        <td colspan="3" class="fw-bold" >Tổng doanh thu</td>
                                        <td colspan="3" class="fw-bold">{{number_format( $tong) }} VNĐ</td>

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


