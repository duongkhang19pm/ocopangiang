@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('doanhnghiep.sanpham.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Sản Phẩm </h1>
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
		                         <th>Thông Tin Sản Phẩm</th>
		                         <th>Tên Sản Phẩm Không Dấu</th>
		                       
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($sanpham as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle"><img src="{{env('APP_URL').'/storage/app/'.$value->hinhanh}}" height="100" width="150"></td>
		                             <td class="align-middle">
		                             	Doanh Nghiệp: {{ $value->DoanhNghiep->tendoanhnghiep }}<br/>
		                             	Nhóm Sản Phẩm: {{ $value->NhomSanPham->tennhom }}<br/>
		                             	Loại Sản Phẩm: {{ $value->LoaiSanPham->tenloai }}<br/>
		                             	Tên Sản Phẩm :{{ $value->tensanpham }}<br/>
		                             	Nguyên Liệu :{{ $value->nguyenlieu }}<br/>
		                             	Đơn Giá :{{ number_format($value->dongia) }} VNĐ<br/>
		                             	Số Lượng : {{ $value->soluong }}<br/>
		                             	Hạn Sử Dụng : {{ $value->hansudung }}<br/>
		                             	Hạn Sử Dụng Sau Khi Mở Hộp : {{ $value->hansudungsaumohop }}<br/>
		                             	Phân Hạng : @if( $value->PhanHang->tenphanhang  == 1)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star "></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 2)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 3)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 4)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
				                              @if( $value->PhanHang->tenphanhang  == 5)
				                                <span class="rating has-readonly">
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                               <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				                                
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>
				      
				                                <label >
				                                  <span class="fa fa-star"style="color:Gold"></span>
				                                </label>

				                              </span>
				                              @endif
		                             			<br/>
		                             </td>
		                            <td>{{ $value->tensanpham_slug }}</td>
		                            
		                             <td class="align-middle text-right">
			                              <a href="{{ route('doanhnghiep.sanpham.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('doanhnghiep.sanpham.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
