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
              <h1 class="page-title mr-sm-auto"> Bài Viết </h1>
              <div class="dropdown">
                <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                <div class="dropdown-menu dropdown-menu-right" style="">
                  <div class="dropdown-arrow"></div>
                    <a href="{{route('donviquanly.baiviet.them')}}" class="dropdown-item"><i class="fa fa-plus mr-2"></i>Thêm Mới</a> 
                    
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
		                         <th >Thông tin bài viết </th>
		                         <th>Tiêu Đề Không Dấu</th>
		                          <th >Lượt Xem</th>
		                          <th >Kiểm Duyệt</th>
		                         
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($baiviet as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">
		                             	Người Đăng: {{ $value->taikhoan->name }}<br/>
		                             	Chủ Đề: {{ $value->ChuDe->tenchude }}<br/>
		                             	Tiêu Đề :{{ $value->tieude }}<br/>
		                             

		                             	Ngày Đăng :{{ Carbon\Carbon::parse($value->ngaydang)->format('d/m/Y') }}<br/>
		                             	
		                             </td>
		                             <td>{{ $value->tieude_slug }}</td>
		                             <td>{{ $value->luotxem }}</td>
		                             <td>
				                             @if($value->kiemduyet == 0)
			                                <a href="{{ route('donviquanly.baiviet.kiemduyet',  ['id' => $value->id] ) }}" >
			                                  <span class="badge badge-pill badge-warning">Bị khóa</span>
			                                </a> 
		                                
		                                @else
		                                		<a href="{{ route('donviquanly.baiviet.kiemduyet',  ['id' => $value->id] ) }}"><span class="badge badge-pill badge-info">Đã Duyệt</span></a> 
		                                @endif
																</td>
		                            
		                             <td class="align-middle text-right">
		                             	<div class="dropdown">
								                    <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
								                    <div class="dropdown-menu dropdown-menu-right" style="">
								                      <div class="dropdown-arrow"></div>
								                        
								                        <a href="{{ route('donviquanly.baiviet.sua', ['id' => $value->id]) }}" class="dropdown-item">Cập Nhật</a> 
								                        <a href="{{ route('donviquanly.baiviet.xoa', ['id' => $value->id]) }}" class="dropdown-item">Xóa</a>
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
