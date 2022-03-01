@extends('layouts.admin')

@section('pagetitle')
	Đơn Vị Quản Lý
@endsection
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
                  <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
              </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Đơn Vị Quản Lý </h1>
              <div class="dropdown">
                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                  <div class="dropdown-arrow"></div>
                    <a href="{{route('admin.donviquanly.them')}}" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Thêm Mới</a> 
                    <a href="{{ route('admin.donviquanly.xuat') }}" class="dropdown-item"><i class="oi oi-data-transfer-download"></i> <span class="ml-1">Export</span></a>
                    <a href="#nhap" class="dropdown-item" data-toggle="modal" data-target="#importModal"><i class="oi oi-data-transfer-upload"></i> <span class="ml-1">Import</span></a> 
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
                         <table class="table table-hover"id="table_id">
		                 <thead>
		                     <tr>
		                         <th >#</th>
		                         <th >Hình ảnh</th>
		                         <th>Thông Tin Đơn Vị Quản Lý</th>

		                         <th >Tên đơn vị quản lý không dấu</th>
		                          
		                          <th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($donviquanly as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">
		                             	 @if(empty($value->hinhanh)||$value->hinhanh == 'N/A' )
                                   <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
                                  @else
                                  <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}"height="90" width="100" />
                                  @endif
		                             </td>
		                             <td class="align-middle">
		                           
		                             	Tên Đơn Vị: {{ $value->tendonviquanly }} <br/>
		                             	Tên Thử Trưởng: {{ $value->tenthutruong }} <br/>
		                             	Địa Chỉ: {{ $value->Xa->Huyen->Tinh->tentinh }} - {{ $value->Xa->Huyen->tenhuyen }} - {{ $value->Xa->tenxa }}  -  Đường:{{ $value->tenduong }}<br/>
		                             	Email: {{ $value->email }}<br/>
		                             	Điện Thoại: {{ $value->SDT }}<br/>
		                             	Website:{{ $value->website }}<br/>
		                             
		                             </td>
		                             <td class="align-middle">{{ $value->tendonviquanly_slug }}</td>
		                             
		                             <td class="align-middle text-right">
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" style="">
                                    <div class="dropdown-arrow"></div>
                                      
                                      <a href="{{ route('admin.donviquanly.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
                                      <a href="{{ route('admin.donviquanly.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa đơn vị quản lý {{ $value->tendonviquanly}} không?')" class="dropdown-item">Xóa</a>
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
<form action="{{ route('admin.donviquanly.nhap') }}" method="post" enctype="multipart/form-data">
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
