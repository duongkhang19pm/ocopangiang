@extends('layouts.admin')

@section('pagetitle')
  Quận/Huyện
@endsection
@section('content')

<!-- .wrapper -->
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
                  <h1 class="page-title mr-sm-auto">Danh Sách Quận/Huyện </h1>
                  <div class="btn-toolbar">
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
                         <table class="table table-hover" id="table_id">
                        <!-- thead -->
                        <thead>
                          <tr>
                           
                            <th >#</th>
                            <th>Tỉnh/Thành Phố</th>
                            <th >Tên Quận/Huyện</th> 
                            <th >Phí Vận Chuyển</th> 
                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                          </tr>
                        </thead>
                        <!-- /thead -->
                        <!-- tbody -->
                        <tbody>
	                        @foreach($huyen as $value)
	                          <!-- tr -->
	                          <tr>
	                            
	                            <td class="align-middle">{{ $loop->iteration }}</td>
                              <td class="align-middle"> {{ $value->Tinh->tentinh }} </td>
	                            <td class="align-middle"> {{ $value->tenhuyen }} </td>
                              <td class="align-middle"> {{ $value->phivanchuyen }} </td>
                              <td class="align-middle text-right">
                              <div class="dropdown">
                                  <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" style="">
                                    <div class="dropdown-arrow"></div>
                                      
                                      <a href="{{ route('admin.huyen.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật Phí Vận Chuyển</a> 
                                      
                                  </div>
                                </div>
                                    
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


<form action="{{ route('admin.huyen.nhap') }}" method="post" enctype="multipart/form-data">
     @csrf
     <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
             <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i></button>
           </div>
          <div class="modal-body">
             <div class="mb-0">
              <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
              <input type="file" class="form-control" id="file_excel" name="file_excel" required />
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Hủy bỏ</button>
             <button type="submit" class="btn btn-danger"><i class="fas fa-upload"></i> Nhập dữ liệu</button>
          </div>
         </div>
       </div>
     </div>
</form>

@endsection
