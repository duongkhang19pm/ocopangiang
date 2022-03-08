@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
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
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Đơn Hàng </h1>
              
            </div>
            <!-- /title and toolbar -->
          </header>
           @if (session('status'))
				        <div class="alert alert-danger" role="alert">
				            {!! session('status')!!}
				        </div>
				    @endif
          <!-- /.page-title-bar -->
          <!-- .page-section -->
          <div class="page-section">
                <!-- .card -->
                <section class="card card-fluid">
                  <!-- .card-body -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <!-- .table -->
                         <table class="table table-hover" id="table_id">
		                 <thead>
		                     <tr>
		                         <th >#</th>
		                         <th >Khách hàng</th>
		                         <th>Thông tin giao hàng </th>
		                   
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                 	@php $stt = 1; @endphp
		                    @foreach($donhang as $value)
		                    		
	                     		@php $ct = ''; 
                                 $tinhtrang = '';
                                 @endphp

		                     	@foreach($value->donhang_chitiet as $chitiet)
		                     			@if( $chitiet->sanpham->doanhnghiep->id == Auth::user()->doanhnghiep->id)
	                     					@php $ct = $chitiet->sanpham_id;
                                                $tinhtrang = $chitiet->tinhtrang_id;
                                             
                                             @endphp
	                     				@endif
	                     		@endforeach	
	                     		
		                     		@if( $ct != null && $tinhtrang ==1 )
			                        <tr>
			                            <td class="align-middle">{{ $loop->iteration }}</td>
			                            <td class="align-middle">{{ $value->hoten }} </td>
			                            <td class="align-middle">
											<span class="d-block">Điện thoại: <strong>{{ $value->dienthoaigiaohang }}</strong></span>
											<span class="d-block">Địa chỉ giao: <strong>{{ $value->Xa->Huyen->Tinh->tentinh }} - {{ $value->Xa->Huyen->tenhuyen }} - {{ $value->Xa->tenxa }}  -  Đường:{{ $value->tenduong }}</strong></span>
											<span class="d-block">Hình thức thanh toán: <strong>{{ $value->HinhThucThanhToan->hinhthucthanhtoan }}</strong></span>
											<span class="d-block">Ngày đặt: <strong>{{ $value->created_at->format('d/m/Y H:i:s') }}</strong></span>
											<span class="d-block">Sản phẩm:</span>
											<table class="table table-hover">
												<thead>
													<th >#</th>
													<th >Sản phẩm</th>
													<th >Số lượng</th>
													<th >Đơn giá</th>
													
													<th >Thành tiền</th>
													<th>Tình trạng</th>
												</thead>
												<tbody>
													@php $tongtien = 0; @endphp
													@php $stt = 1; @endphp
													@foreach($value->donhang_chitiet as $chitiet)
														@if( $chitiet->sanpham->doanhnghiep->id == Auth::user()->doanhnghiep->id)
															<tr>
																<td class="align-middle">{{ $stt++ }}</td>
																<td class="align-middle">{{ $chitiet->sanpham->tensanpham }}</td>
																<td class="align-middle">{{ $chitiet->soluongban }}</td>
																<td class="text-end">{{ number_format($chitiet->sanpham->dongia) }}<sup><u>đ</u></sup></td>
															
																<td class="text-end">{{ number_format($chitiet->dongiaban) }}<sup><u>đ</u></sup></td>
																<td class="text-end"> 
																	
														
																		{{$chitiet->TinhTrang->tinhtrang}}
														
																</td>
															</tr>
															@php $tongtien += $chitiet->dongiaban; @endphp
														@endif
													@endforeach
													<tr>
														<td colspan="4">Phí vận chuyển:</td>
														<td class="text-end"><strong>{{ number_format($value->Xa->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
													</tr>
													<tr>
														
														<td colspan="4">Tổng tiền sản phẩm:</td>
														<td class="text-end"><strong>{{ number_format($tongtien + $value->Xa->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
													</tr>
												
												</tbody>
											</table>

			                            	
			                            	</td>
			                           
			                            
			                            
			                            <td class="align-middle text-right">
		                             		<div class="dropdown">
												<button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
												<div class="dropdown-menu dropdown-menu-right" style="">
													<div class="dropdown-arrow"></div>
													
													<a href="{{ route('doanhnghiep.donhang.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
													<a href="{{ route('doanhnghiep.donhang.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa đơn hàng của {{ $value->hoten}} không?')" class="dropdown-item">Xóa</a>
												</div>
											</div>
		                             		
	                            		</td>
			                         </tr>
	                      
			              
	                     		
		                    	   @endif
		                    @endforeach

		                 </tbody>
		              </table>
		             
                      <!-- /.table -->
                    </div>
                      
                  </div>
                </section>
               
          </div>
          <!-- /.page-section -->
        </div>
        <!-- /.page-inner -->
  </div>
  <!-- /.page -->
</div>

@endsection
