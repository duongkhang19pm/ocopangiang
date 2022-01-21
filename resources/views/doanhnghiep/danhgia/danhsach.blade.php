@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('doanhnghiep.baiviet.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Ý kiến đánh giá của khách hàng về {{$sanpham->tensanpham}} </h1>
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
		                         <th >Nội Dung </th>
		                         <th>Khách Hàng Đánh Giá</th>
		                         <th >Ngày</th>
		                          <th >Hiển Thị</th>
		                        
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($danhgia as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">{{ $value->noidung }}</td>
		                             <td class="align-middle">{{ $value->TaiKhoan->name }}</td>
		                             <td class="align-middle">{{ Carbon\Carbon::parse( $value->created_at)->format('d/m/Y') }}</td>
		                             <td>
				                             @if($value->hienthi == 0)
			                                <a href="{{ route('doanhnghiep.danhgia.hienthi',  ['id' => $value->id] ) }}" >
			                                  <span class="badge badge-pill badge-warning">Bị khóa</span>
			                                </a> 
		                                
		                                @else
		                                		<a href="{{ route('doanhnghiep.danhgia.hienthi',  ['id' => $value->id] ) }}"><span class="badge badge-pill badge-info">Đã Duyệt</span></a> 
		                                @endif
																</td>
		                           
		                             <td class="align-middle text-right">
			                              <a   href="{{ route('doanhnghiep.danhgia.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
