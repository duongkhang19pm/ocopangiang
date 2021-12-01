@extends('layouts.app')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('admin.nhanvien.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Nhân Viên </h1>
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
		                         <th>Thông Tin Nhân Viên</th>
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($nhanvien as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle"><img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh}}" height="100" width="150"></td>
		                             <td class="align-middle">
		                             	Doanh Nghiệp: {{ $value->DoanhNghiep->tendoanhnghiep }}<br/>
		                             	Chức Vụ: {{ $value->ChucVu->tenchucvu }} <br/>
		                             	Họ Và Tên: {{ $value->tennhanvien }}<br/>
		                             	Địa Chỉ: {{ $value->Tinh->tentinh }} - {{ $value->Huyen->tenhuyen }} - {{ $value->Xa->tenxa }}  -  Đường:{{ $value->tenduong }}<br/>
		                             	CMND/CCCD: {{ $value->CMND }}<br/>
		                             	Email: {{ $value->email }}<br/>
		                             	Điện Thoại: {{ $value->SDT }}<br/>
		                             	Ngày Sinh: {{ $value->ngaysinh }}<br/>

		                             	Giới Tính: @if( $value->gioitinh == 0)
		                             								Nữ
		                             							@endif
		                             							@if ( $value->gioitinh == 1)
		                             								Nam
		                             							@endif
		                             			<br/>
		                             </td>
		                            
		                             
		                             <td class="align-middle text-right">
			                              <a href="{{ route('admin.nhanvien.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('admin.nhanvien.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
                       {{ $nhanvien->links() }}
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
