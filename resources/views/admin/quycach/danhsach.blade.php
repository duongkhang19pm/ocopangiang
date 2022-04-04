@extends('layouts.admin')

@section('pagetitle')
  Quy Cách
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
              <h1 class="page-title mr-sm-auto"> Quy Cách Đóng Gói </h1>
              <div class="dropdown">
                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                  <div class="dropdown-arrow"></div>
                    <a href="{{route('admin.quycach.them')}}" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Thêm Mới</a> 
                    
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
		                         <th>Đơn Vị Tính</th>
		                         <th >Tên Quy Cách Đóng Gói</th>
		                          <th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($quycach as $value)
		                         <tr>
		                             <td class="align-middle">{{ $quycach->firstItem() + $loop->index }}</td>
		                             <td class="align-middle">{{ $value->DonViTinh->tendonvitinh }}</td>
		                             <td class="align-middle">{{ $value->tenquycach }}</td>
		                             <td class="align-middle text-right">
                                <div class="dropdown">
                                  <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" style="">
                                    <div class="dropdown-arrow"></div>
                                      
                                      <a href="{{ route('admin.quycach.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
                                      <a href="{{ route('admin.quycach.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa quy cách đóng gói {{ $value->tenquycach}} không?')" class="dropdown-item">Xóa</a>
                                  </div>
                                </div>
                                    
                              </td>
		                         </tr>
		                     @endforeach
		                 </tbody>
		              </table>

                      <!-- /.table -->
                    </div>
                      <ul class="pagination justify-content-center mt-4">
                       {{ $quycach->links() }}
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
