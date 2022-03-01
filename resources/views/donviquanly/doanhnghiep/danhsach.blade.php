@extends('layouts.donviquanly')

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
                  <a href="{{ route('donviquanly.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>
                </li>
              </ol>
            </nav>
            <div class="d-md-flex align-items-md-start">
              <h1 class="page-title mr-sm-auto"> Doanh Nghiệp </h1>
              <div class="dropdown">
                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                  <div class="dropdown-arrow"></div>
                    <a href="{{route('donviquanly.doanhnghiep.them')}}" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Thêm Mới</a> 
                    <a href="{{ route('donviquanly.doanhnghiep.xuat') }}"class="dropdown-item"><i class="oi oi-data-transfer-download mr-2"></i>Export</a> 
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
		                        <th >Hình ảnh</th>
		                        <th>Thông Tin Doanh Nghiệp</th>
		                        <th >Tên doanh nghiệp không dấu</th>
		                        <th style="width:100px; min-width:100px;"> &nbsp; </th>
			                    </tr>
			                 	</thead>
				                <tbody>
				                     @foreach($doanhnghiep as $value)
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
				                             	Mã Số Thuế :{{ $value->masothue }}<br/>
				                             	Tên Doanh Nghiệp: {{ $value->tendoanhnghiep }} <br/>
				                             	Địa Chỉ: {{ $value->xa->huyen->tinh->tentinh ?? 'N/A'}} - {{ $value->xa->huyen->tenhuyen ?? 'N/A' }} - {{ $value->xa->tenxa ?? 'N/A'}}  -  {{ $value->tenduong ?? 'N/A'}}<br/>
				                             	Tọa Độ : {{ $value->kinhdo }} - {{ $value->vido }}<br/>
				                             	Loại Hình Kinh Doanh: {{ $value->LoaiHinhKinhDoanh->tenloaihinhkinhdoanh }} <br/>
				                             	Mô Hình Kinh Donah: {{ $value->MoHinhKinhDoanh->tenmohinhkinhdoanh }}<br/>
				                             	Email: {{ $value->email }}<br/>
				                             	Điện Thoại: {{ $value->SDT }}<br/>
				                             	Website: {{ $value->website ?? 'N/A'}}<br/>
				                             	Ngày Thành Lập: {{ Carbon\Carbon::parse( $value->ngaythanhlap)->format('d/m/Y') }}<br/>
				                             </td>
				                             <td class="align-middle">{{ $value->tendoanhnghiep_slug }}</td>
				                             
				                             <td class="align-middle text-right">
				                             	<div class="dropdown">
										                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
										                    <div class="dropdown-menu dropdown-menu-right" style="">
										                      <div class="dropdown-arrow"></div>
										                        <a href="{{ route('donviquanly.doanhnghiep.doanhthu_doanhnghiep', ['id' => $value->id]) }}" class="dropdown-item">DoanhThu</a> 
										                        <a href="{{ route('donviquanly.doanhnghiep.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
										                        <a href="{{ route('donviquanly.doanhnghiep.xoa', ['id' => $value->id]) }}" class="dropdown-item">Xóa</a>
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
<form action="{{ route('donviquanly.doanhnghiep.nhap') }}" method="post" enctype="multipart/form-data">
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
