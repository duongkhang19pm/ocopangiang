@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
              
                
         
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
                         <table class="table table-hover">
		                 <thead>
		                     <tr>
		                         <th >#</th>
		                         <th >Khách hàng</th>
		                         <th>Thông tin giao hàng </th>
		                         <th>Tình trạng</th>
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>

		                     @foreach($donhang as $value)
		                        <tr>
		                            <td class="align-middle">{{ $loop->iteration }}</td>
		                            <td class="align-middle">{{ $value->hoten }} </td>
		                            <td class="align-middle">
																	<span class="d-block">Điện thoại: <strong>{{ $value->dienthoaigiaohang }}</strong></span>
																	<span class="d-block">Địa chỉ giao: <strong>{{ $value->Tinh->tentinh }} - {{ $value->Huyen->tenhuyen }} - {{ $value->Xa->tenxa }}  -  Đường:{{ $value->tenduong }}</strong></span>
																	<span class="d-block">Hình thức thanh toán: <strong>{{ $value->HinhThucThanhToan->hinhthucthanhtoan }}</strong></span>
																	<span class="d-block">Ngày đặt: <strong>{{ $value->created_at->format('d/m/Y H:i:s') }}</strong></span>
																	<span class="d-block">Sản phẩm:</span>
																		<table class="table table-hover">
																			<thead>
																				<th >#</th>
																				<th >Sản phẩm</th>
																				<th >Số lượng</th>
																				<th >Đơn giá</th>
																				<th >VAT</th>
																				<th >Thành tiền</th>
																			</thead>
                                    	<tbody>
                                    		@php $tongtien = 0; @endphp
                                    		@foreach($value->DonHang_ChiTiet as $chitiet)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $chitiet->SanPham->tensanpham }}</td>
                                                <td class="align-middle">{{ $chitiet->soluongban }}</td>
                                                <td class="text-end">{{ number_format($chitiet->SanPham->dongia) }}<sup><u>đ</u></sup></td>
                                                <td class="text-end">{{ number_format($chitiet->SanPham->dongia *0.1) }}<sup><u>đ</u></sup></td>
                                                <td class="text-end">{{ number_format($chitiet->dongiaban) }}<sup><u>đ</u></sup></td>
                                            </tr>
                                            @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
                                        @endforeach
                                         <tr>
                                         		<td colspan="5">Phí vận chuyển:</td>
                                            
                                            <td class="text-end"><strong>{{ number_format($value->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
                                        </tr>
                                         <tr>
                                         		
                                            <td colspan="5">Tổng tiền sản phẩm:</td>
                                            <td class="text-end"><strong>{{ number_format($tongtien + $value->Huyen->phivanchuyen) }}</strong><sup><u>đ</u></sup></td>
                                        </tr>
                                        
                                    	</tbody>
																		</table>

		                            	
		                            </td>
		                            <td class="align-middle">
	                                @if($value->tinhtrang_id == 10)
	                                
	                                    {{$value->TinhTrang->tinhtrang}}
	                                
	                                @else
	                                
	                                    <select id="tinhtrang_id"  onchange="document.location.href = '{{route('doanhnghiep.donhang.tinhtrang',['id' => $value->id, 'tinhtrang_id' => '1' ])}}'+ this.options[this.selectedIndex].value;">

	                                    @if ($value->tinhtrang_id == 1)
	                                    
	                                        <option value="1" selected>Đơn hàng mới</option>
	                                        <option value="2">Đang xác nhân </option>
	                                        <option value="3" >Đã hủy</option>
	                                        <option value="4" >Đã đóng gói</option>
	                                        <option value="5" >Đang đi nhận</option>
	                                        <option value="6" >Đang chuyển</option>
	                                        <option value="7" >Thất bại</option>
	                                        <option value="8" >Đang chuyển hoàn</option>
	                                        <option value="9" >Đã chuyển hoàn</option>
	                                        <option value="10" >Thành công</option>

	                                    

	                                        @else @if ($value->tinhtrang_id == 2)
	                                        


	                                            <option value="1" >Đơn hàng mới</option>
	                                            <option value="2" selected>Đang xác nhân </option>
	                                            <option value="3" >Đã xác nhân</option>
	                                            <option value="4" >Đã hủy</option>
	                                            <option value="5" >Đang đóng gói</option>
	                                            <option value="6" >Đang chuyển</option>
	                                            <option value="7" >Thất bại</option>
	                                            <option value="8" >Đang chuyển hoàn</option>
	                                            <option value="9" >Đã chuyển hoàn</option>
	                                            <option value="10" >Thành công</option>
	                                        
	                                            @else @if ($value->tinhtrang_id == 3)
	                                            


	                                                <option value="1" >Đơn hàng mới</option>
	                                                <option value="2" >Đang xác nhân </option>
	                                                <option value="3" selected>Đã xác nhân</option>
	                                                <option value="4" >Đã hủy</option>
	                                                <option value="5" >Đang đóng gói</option>
	                                                <option value="6" >Đang chuyển</option>
	                                                <option value="7" >Thất bại</option>
	                                                <option value="8" >Đang chuyển hoàn</option>
	                                                <option value="9" >Đã chuyển hoàn</option>
	                                                <option value="10" >Thành công</option>

	                                            
	                                                @else @if ($value->tinhtrang_id == 4)
	                                                


	                                                    <option value="1" >Đơn hàng mới</option>
	                                                    <option value="2" >Đang xác nhân </option>
	                                                    <option value="3" >Đã xác nhân</option>
	                                                    <option value="4" selected>Đã hủy</option>
	                                                    <option value="5" >Đang đóng gói</option>
	                                                    <option value="6" >Đang chuyển</option>
	                                                    <option value="7" >Thất bại</option>
	                                                    <option value="8" >Đang chuyển hoàn</option>
	                                                    <option value="9" >Đã chuyển hoàn</option>
	                                                    <option value="10" >Thành công</option>

	                                                
	                                                    @else @if ($value->tinhtrang_id == 5)
	                                                    


	                                                        <option value="1" >Đơn hàng mới</option>
	                                                        <option value="2" >Đang xác nhân </option>
	                                                        <option value="3" >Đã xác nhân</option>
	                                                        <option value="4" >Đã hủy</option>
	                                                        <option value="5" selected>Đang đóng gói</option>
	                                                        <option value="6" >Đang chuyển</option>
	                                                        <option value="7" >Thất bại</option>
	                                                        <option value="8" >Đang chuyển hoàn</option>
	                                                        <option value="9" >Đã chuyển hoàn</option>
	                                                        <option value="10" >Thành công</option>

	                                                    
	                                                        @else @if ($value->tinhtrang_id == 6)
	                                                        


	                                                            <option value="1" >Đơn hàng mới</option>
	                                                            <option value="2" >Đang xác nhân </option>
	                                                            <option value="3" >Đã xác nhân</option>
	                                                            <option value="4" >Đã hủy</option>
	                                                            <option value="5" >Đang đóng gói</option>
	                                                            <option value="6" selected>Đang chuyển</option>
	                                                            <option value="7" >Thất bại</option>
	                                                            <option value="8" >Đang chuyển hoàn</option>
	                                                            <option value="9" >Đã chuyển hoàn</option>
	                                                            <option value="10" >Thành công</option>

	                                                        
	                                                            @else @if ($value->tinhtrang_id == 7)
	                                                            


	                                                                <option value="1" >Đơn hàng mới</option>
	                                                                <option value="2" >Đang xác nhân </option>
	                                                                <option value="3" >Đã xác nhân</option>
	                                                                <option value="4" >Đã hủy</option>
	                                                                <option value="5" >Đang đóng gói</option>
	                                                                <option value="6" >Đang chuyển</option>
	                                                                <option value="7" selected>Thất bại</option>
	                                                                <option value="8" >Đang chuyển hoàn</option>
	                                                                <option value="9" >Đã chuyển hoàn</option>
	                                                                <option value="10" >Thành công</option>

	                                                            
	                                                                @else @if ($value->tinhtrang_id == 8)
	                                                                


	                                                                    <option value="1" >Đơn hàng mới</option>
	                                                                    <option value="2" >Đang xác nhân </option>
	                                                                    <option value="3" >Đã xác nhân</option>
	                                                                    <option value="4" >Đã hủy</option>
	                                                                    <option value="5" >Đang đóng gói</option>
	                                                                    <option value="6" >Đang chuyển</option>
	                                                                    <option value="7" >Thất bại</option>
	                                                                    <option value="8" selected>Đang chuyển hoàn</option>
	                                                                    <option value="9" >Đã chuyển hoàn</option>
	                                                                    <option value="10" >Thành công</option>

	                                                                
	                                                                    @else @if ($value->tinhtrang_id == 9)
	                                                                    


	                                                                        <option value="1" >Đơn hàng mới</option>
	                                                                        <option value="2" >Đang xác nhân </option>
	                                                                        <option value="3" >Đã xác nhân</option>
	                                                                        <option value="4" >Đã hủy</option>
	                                                                        <option value="5" >Đang đóng gói</option>
	                                                                        <option value="6" >Đang chuyển</option>
	                                                                        <option value="7" >Thất bại</option>
	                                                                        <option value="8" >Đang chuyển hoàn</option>
	                                                                        <option value="9" selected>Đã chuyển hoàn</option>
	                                                                        <option value="10" >Thành công</option>

	                                                                    
	                                                                        @else @if ($value->tinhtrang_id == 10)
	                                                                        


	                                                                            <option value="1" >Đơn hàng mới</option>
	                                                                            <option value="2" >Đang xác nhân </option>
	                                                                            <option value="3" >Đã xác nhân</option>
	                                                                            <option value="4" >Đã hủy</option>
	                                                                            <option value="5" >Đang đóng gói</option>
	                                                                            <option value="6" >Đang chuyển</option>
	                                                                            <option value="7" >Thất bại</option>
	                                                                            <option value="8" >Đang chuyển hoàn</option>
	                                                                            <option value="9" >Đã chuyển hoàn</option>
	                                                                            <option value="10" selected>Thành công</option>

	                                                                        
	                                                                        @endif
	                                                                    @endif
	                                                                @endif
	                                                            @endif
	                                                        @endif
	                                                    @endif
	                                                @endif
	                                            @endif
	                                        @endif
	                                    @endif
	                                </select>   
	                                
	                                 @endif
	   
	                            </td>
		                            
		                            
		                            <td class="align-middle text-right">
			                              <a href="{{ route('doanhnghiep.donhang.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('doanhnghiep.donhang.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="far fa-trash-alt"></i>
			                                <span class="sr-only">Remove</span>
			                              </a>
	                            	</td>
		                         </tr>
		                     @endforeach
		                 </tbody>
		              </table>
		             
                      <!-- /.table -->
                    </div>
                      <ul class="pagination justify-content-center mt-4">

                     </ul>
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
