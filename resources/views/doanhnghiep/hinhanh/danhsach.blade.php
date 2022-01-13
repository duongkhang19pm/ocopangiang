@extends('layouts.doanhnghiep')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('doanhnghiep.hinhanh.them',['tensanpham_slug'=>$sanpham->tensanpham_slug])}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
                
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Hình Ảnh ({{$sanpham->tensanpham}} )</h1>
                  
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
		                         
															<th style="width:100px; min-width:100px;"> &nbsp; </th>
		                     </tr>
		                 </thead>
		                 <tbody>
		                     @foreach($hinhanh as $value)
		                         <tr>
		                             <td class="align-middle">{{ $loop->iteration }}</td>
		                             <td class="align-middle">
		                             	 @if(empty($value->hinhanh)||$value->hinhanh == 'N/A')
                                   <img src="{{env('APP_URL').'/public/Image/noimage.png'}}"height="90" width="100" >
                                  @else
                                  <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}"height="90" width="100" alt="" />
                                  @endif
		                            	


		                             </td>
		                             
		                             <td class="align-middle text-right">
			                              <a href="{{ route('doanhnghiep.hinhanh.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
			                                <i class="fa fa-pencil-alt"></i>
			                                <span class="sr-only">Edit</span>
			                              </a>
			                              <a   href="{{ route('doanhnghiep.hinhanh.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
