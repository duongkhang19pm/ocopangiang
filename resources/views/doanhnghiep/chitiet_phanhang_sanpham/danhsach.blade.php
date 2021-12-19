@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('doanhnghiep.chitiet_phanhang_sanpham.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Chi Tiet Sản Phẩm </h1>
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
		                         <th >San Pham</th>
		                         <th>Phan Hang</th>
		                          <th >Ngay Bat Dau</th>
		                          <th >Ngay Ket Thuc</th>
		                         
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($chitiet_phanhang_sanpham as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">
		                             
		                             	{{ $value->SanPham->tensanpham }}
		                             	
		                             </td>
		                             <td>{{ $value->PhanHang->tenphanhang }}</td>
		                             <td>{{ $value->ngaybatdau }}</td>
		                             <td>{{ $value->ngayketthuc }}</td>
		                            
		                            
		                             
		                             <td class="align-middle text-right">
			                              <a href="{{ route('doanhnghiep.chitiet_phanhang_sanpham.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('doanhnghiep.chitiet_phanhang_sanpham.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
