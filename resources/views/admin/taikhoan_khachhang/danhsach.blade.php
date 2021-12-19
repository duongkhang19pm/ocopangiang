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
                <a type="button" href="{{route('admin.taikhoan_khachhang.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Tài Khoản Khách Hàng</h1>
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
                            <th >Hình Ảnh</th>
                            <th >Thông Tin</th>
		                        
                            
                            <th >Quyền Hạn</th>
                            <th >Tình Trạng</th>
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
                              <td class="align-middle">
                                 @if(empty($value->hinhanh))
                                   <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
                                  @else
                                  <img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh  }}"height="90" width="100" />
                                  @endif
                              </td>
                              <td class="align-middle"> 
                                Họ Và Tên: {{ $value->name }} <br/>
                               Địa Chỉ: {{ $value->tinh->tentinh ?? 'N/A'}} - {{ $value->huyen->tenhuyen ?? 'N/A' }} - {{ $value->xa->tenxa ?? 'N/A'}}  -  Đường:{{ $value->tenduong ?? 'N/A'}}<br/>
                               Email: {{ $value->email }} <br/>
                               Điện Thoại: {{ $value->phone }}<br/>
                               Tên Đăng Nhập: {{ $value->username }} 
                                 </td>
	                            
                               <td class="align-middle"><span class="badge badge-pill badge-danger">Khách Hàng</span></td>

                               <td class="align-middle">
                                @if($value->kichhoat == 0)
                                <a href="#"></a> 
                                <span class="badge badge-pill badge-info">Đang sử dụng</span>
                                @else
                                <a href="#"></a> <span class="badge badge-pill badge-warning">Bị khóa</span>
                                @endif
                                </td>
	                            <td class="align-middle text-right">
	                              <a href="{{ route('admin.taikhoan_khachhang.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
	                                <i class="fa fa-pencil-alt"></i>
	                                <span class="sr-only">Edit</span>
	                              </a>
	                               <a   href="{{ route('admin.taikhoan_khachhang.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
