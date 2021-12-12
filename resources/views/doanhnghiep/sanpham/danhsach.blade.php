@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('doanhnghiep.sanpham.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
                
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Sản Phẩm </h1>
                  <div class="btn-toolbar">
                    <a type="button" href="{{ route('doanhnghiep.sanpham.xuat') }}" class="btn btn-light" ><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a>
                    <a type="button" href="#nhap" class="btn btn-light" data-toggle="modal" data-target="#importModal"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></a>
                    
                  </div>
                </div>
            <!-- /title and toolbar -->
          </header>
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
		                         <th >Hình ảnh</th>
		                         <th>Thông Tin Sản Phẩm</th>
		                         <th>Tên Sản Phẩm Không Dấu</th>
		                       
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($sanpham as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle"><img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh}}" height="100" width="100"></td>
		                             <td class="align-middle">
		                             	<strong >Tên Sản Phẩm: </strong> <a href="{{ route('doanhnghiep.sanpham.sua', ['id' => $value->id]) }}">{{ $value->tensanpham }}</a><br/>
		                             	<strong>Doanh Nghiệp: </strong> {{ $value->DoanhNghiep->tendoanhnghiep }}<br/>
		                             	<strong>Nhóm Sản Phẩm: </strong>{{ $value->NhomSanPham->tennhom }}<br/>
		                             	<strong>Loại Sản Phẩm: </strong>{{ $value->LoaiSanPham->tenloai }}<br/>
		                             	<strong>Nguyên Liệu: </strong>{{ $value->nguyenlieu }}<br/>
		                             	<strong>Tiêu Chuẩn: </strong>{{ $value->tieuchuan }}<br/>
		                             	<strong>Điều Kiện Lưu Trữ :</strong>{{ $value->dieukienluutru }}<br/>
		                             	<strong>Điều Kiện Vận Chuyển: </strong>{{ $value->dieukienvanchuyen }}<br/>
		                             	<strong>Khối Lượng Riêng: </strong>{{ $value->khoiluongrieng }}<br/>
		                             	<strong>Đơn Giá: </strong>{{ number_format($value->dongia) }} VNĐ<br/>
		                             	<strong>Số Lượng: </strong>{{ $value->soluong }}<br/>
		                             	<strong>Đơn Vị Tính: </strong>{{ $value->DonViTinh->tendonvitinh }}<br/>
		                             	<strong>Quy Cách Đóng Gói: </strong>{{ $value->QuyCach->tenquycach }}<br/>
		                             	<strong>Hạn Sử Dụng: </strong>{{ $value->hansudung }}<br/>
		                             	<strong>Hạn Sử Dụng Sau Khi Mở Hộp :</strong> {{ $value->hansudungsaumohop }}<br/>
		                             	<strong>Phân Hạng :</strong> 
		                             	@if( $value->PhanHang->tenphanhang  == 1)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star "></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 2)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 3)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 4)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 5)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
		                             			<br/>
		                             </td>
		                            <td>{{ $value->tensanpham_slug }}</td>
		                            
		                             <td class="align-middle text-right">
			                              <a href="{{ route('doanhnghiep.sanpham.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('doanhnghiep.sanpham.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
                       {{$sanpham->links()}}
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
<form action="{{ route('doanhnghiep.sanpham.nhap') }}" method="post" enctype="multipart/form-data">
	 @csrf
		 <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
			 <div class="modal-dialog">
				 <div class="modal-content">
					 <div class="modal-header">
						 <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
						 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
					 </div>
					<div class="modal-body">
						 <div class="mb-0">
							 <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
							 <input type="file" class="form-control" id="file_excel" name="file_excel" required />
							 </div>
						 </div>
					<div class="modal-footer">
					 <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fal fa-times"></i> Hủy bỏ</button>
					 <button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
				 </div>
			 </div>
		 </div>
	 </div>
 </form>

@endsection
