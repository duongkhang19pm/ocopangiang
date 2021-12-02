@extends('layouts.admin')

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
                      <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
                    </li>
                  </ol>
                </nav>
                <a type="button" href="{{route('admin.taikhoan_doanhnghiep.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Tài Khoản Doanh Nghiệp </h1>
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
                        <!-- thead -->
                        <thead>
                          <tr>
                           
                            <th >#</th>
                            <th >Họ Và Tên</th>
		                        <th >Tên Đăng Nhập</th>
                            <th >Email</th>
                            <th >Điện Thoại</th>
                            <th >Quyền Hạn</th>
                            <th>Doanh Nghiệp</th>
                            <th>Chức Vụ</th>
                            <th>Trạng Thái</th>
                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                          </tr>
                        </thead>
                        <!-- /thead -->
                        <!-- tbody -->
                        <tbody>
	                        @foreach($taikhoan as $value)
	                          <!-- tr -->
	                          <tr>
	                            
	                            <td class="align-middle">{{ $loop->iteration }}</td>
                              <td class="align-middle"> {{ $value->name }} </td>
	                            <td class="align-middle"> {{ $value->username }} </td>
	                            <td class="align-middle"> {{ $value->email }} </td>
	                             <td class="align-middle"> {{ $value->phone }} </td>
                              <td class="align-middle"><span class="badge badge-pill badge-success">Nhân Viên Doanh Nghiệp</span></td>
                              <td class="align-middle">{{ $value->doanhnghiep->tendoanhnghiep ?? 'N/A' }}</td>
                               <td class="align-middle">{{ $value->chucvu->tenchucvu ?? 'N/A' }}</td>
                               <td class="align-middle">
                                @if($value->kichhoat == 0)
                                <a href="#"></a> 
                                <span class="badge badge-pill badge-info">Đang sử dụng</span>
                                @else
                                <a href="#"></a> <span class="badge badge-pill badge-warning">Bị khóa</span>
                                @endif
                                </td>
	                            <td class="align-middle text-right">
	                              <a href="{{ route('admin.taikhoan_doanhnghiep.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
	                                <i class="fa fa-pencil-alt"></i>
	                                <span class="sr-only">Edit</span>
	                              </a>
	                               <a   href="{{ route('admin.taikhoan_doanhnghiep.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
                                      <i class="far fa-trash-alt"></i>
                                      <span class="sr-only">Remove</span>
                                    </a>
	                            </td>
	                          </tr>
                          <!-- /tr -->
                          @endforeach
                    
                        </tbody>
                        <!-- /tbody -->
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
