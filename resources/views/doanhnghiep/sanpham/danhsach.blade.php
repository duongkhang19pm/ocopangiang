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
              <h1 class="page-title mr-sm-auto"> Sản Phẩm </h1>
              <div class="dropdown">
                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                  <div class="dropdown-arrow"></div>
                    <a href="{{route('doanhnghiep.sanpham.them')}}" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Thêm Mới</a> 
                    <a href="{{ route('doanhnghiep.sanpham.xuat') }}"class="dropdown-item"><i class="oi oi-data-transfer-download mr-2"></i>Export</a> 
                    <a href="#nhap" class="dropdown-item" data-toggle="modal" data-target="#importModal"><i class="oi oi-data-transfer-upload mr-2"></i> Import</a>
                </div>
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
                         <table class="table table-hover" id="table_id">
		                 <thead>
		                     <tr>
		                         <th >#</th>
		                         <th >Hình ảnh đại diện</th>
		                         <th>Thông Tin Sản Phẩm</th>
		                         <th>Tên Sản Phẩm Không Dấu</th>
		                         <th> Đánh Giá</th>
		                       		<th>Hiển Thị</th>

															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($sanpham as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">
		                             	@if(empty($value->hinhanh)||$value->hinhanh == 'N/A')
                                   <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
                                  @else
                                  <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}"height="90" width="100" />
                                  @endif
		                             </td>
		                             <td class="align-middle">
		                             	<strong >Tên Sản Phẩm: </strong> <a href="{{ route('doanhnghiep.sanpham.sua', ['id' => $value->id]) }}">{{ $value->tensanpham }}</a><br/>
		                             	<strong>Doanh Nghiệp: </strong> {{ $value->DoanhNghiep->tendoanhnghiep }}<br/>
		                             		<strong>Nhóm Sản Phẩm: </strong>{{ $value->loaisanpham->nhomsanpham->tennhom }}<br/>
		                             	<strong>Loại Sản Phẩm: </strong>{{ $value->loaisanpham->tenloai }}<br/>
		                             	
 																	@foreach($value->ChiTiet_PhanHang_SanPham as $ct)

 																	<strong>Phân Hạng: </strong>
 																			@if( $ct->phanhang_id  == 1)
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
				                              @if( $ct->phanhang_id  == 2)
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
				                              @if( $ct->phanhang_id  == 3)
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
				                              @if( $ct->phanhang_id  == 4)
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
				                              @if( $ct->phanhang_id  == 5)
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


		                             	<strong>Ngày Bắt Đầu: </strong>{{ Carbon\Carbon::parse($ct->ngaybatdau)->format('d/m/Y') }}<br/>
										 @if($ct->ngayketthuc != null)
		                             	<strong>Ngày Kết Thúc: </strong>{{ Carbon\Carbon::parse($ct->ngayketthuc)->format('d/m/Y') }}<br/>
										 @else
										 <strong>Ngày Kết Thúc: </strong><br/>
										 @endif

		                             	
		                             	@endforeach

		                             	<strong>Nguyên Liệu: </strong>{{ $value->nguyenlieu ?? 'N/A'}}<br/>
		                             	<strong>Tiêu Chuẩn: </strong>{{ $value->tieuchuan ?? 'N/A'}}<br/>
		                             	<strong>Điều Kiện Lưu Trữ :</strong>{{ $value->dieukienluutru ?? 'N/A'}}<br/>
		                             	<strong>Điều Kiện Vận Chuyển: </strong>{{ $value->dieukienvanchuyen ?? 'N/A'}}<br/>
		                             	<strong>Khối Lượng Riêng: </strong>{{ $value->khoiluongrieng }}<br/>
		                             	<strong>Đơn Giá: </strong>{{ number_format($value->dongia) }} VNĐ<br/>
		                             	<strong>Số Lượng: </strong>{{ $value->soluong }}<br/>
		                             <strong>Đơn Vị Tính: </strong>{{ $value->QuyCach->DonViTinh->tendonvitinh }}<br/>
		                             	<strong>Quy Cách Đóng Gói: </strong>{{ $value->QuyCach->tenquycach }}<br/>
		                             	<strong>Hạn Sử Dụng: </strong>{{ $value->hansudung ?? 'N/A'}}<br/>
		                             	<strong>Hạn Sử Dụng Sau Khi Mở Hộp :</strong> {{ $value->hansudungsaumohop ?? 'N/A'}}<br/>
		                             	<strong>Hình Ảnh Đính Kèm :</strong>
		                             	@if(!empty($value->thumuc))
																		<a href="#hinhanh" onclick="getXemHinh({{ $value->id }})"><i class="fas fa-images fa-2x"></i></a>
																	@endif
		                             </td>
		                            <td>{{ $value->tensanpham_slug }}</td>
		                            <td>
		                             	@if($value->danhgia == 0)
																			<a  href="{{ route('doanhnghiep.sanpham.danhgia', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
																		@endif
																		@if($value->danhgia == 1)
																			<a href="{{ route('doanhnghiep.sanpham.danhgia', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i></a>
																		@endif
																	</td>
		                             <td>
		                             	@if($value->hienthi == 0)
																			<a  href="{{ route('doanhnghiep.sanpham.hienthi', ['id' => $value->id])  }}"><i class="fas fa-ban text-danger"></i></a>
																		@endif
																		@if($value->hienthi == 1)
																			<a href="{{ route('doanhnghiep.sanpham.hienthi', ['id' => $value->id])  }}"><i class="fas fa-check-circle text-info"></i></a>
																		@endif
																	</td>
		                            <td class="align-middle text-right">
		                             	<div class="dropdown">
								                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
								                    <div class="dropdown-menu dropdown-menu-right" style="">
								                      <div class="dropdown-arrow"></div>
								                        <a href="{{ route('doanhnghiep.danhgia', ['tensanpham_slug' => $value->tensanpham_slug]) }}" class="dropdown-item">Xem Đánh Giá</a> 
								                        <a href="{{ route('doanhnghiep.sanpham.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
								                        <a href="{{ route('doanhnghiep.sanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa sản phẩm {{ $value->tensanpham}} không?')" class="dropdown-item">Xóa</a>
								                    </div>
								                  </div>
		                             		
	                            	</td>
		                            
		                         </tr>
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
@section('javascript')
<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
	<script>
		function getXemHinh(id) {
			$.ajax({
				url: '{{ route("doanhnghiep.sanpham.xemhinh") }}',
				method: 'POST',
				data: { _token: '{{ csrf_token() }}', id: id },
				dataType: 'text',
				success: function(data) {
					CKFinder.modal(
					{
						displayFoldersPanel: false,
						width: 800,
						height: 500
					});
				}
			});
		}
		
		
	</script>
@endsection