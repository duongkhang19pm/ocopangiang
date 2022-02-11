@extends('layouts.admin')

@section('pagetitle')
  Hình Thức Thanh Toán
@endsection
@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('admin.hinhthucthanhtoan.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Hình Thức Thanh Toán </h1>
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
                             <th >Tên Hình Thức Thanh Toán</th>
		               
                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                          </tr>
                        </thead>
                        <!-- /thead -->
                        <!-- tbody -->
                        <tbody>
	                        @foreach($hinhthucthanhtoan as $value)
	                          <!-- tr -->
	                          <tr>
	                            
	                            <td class="align-middle">{{ $hinhthucthanhtoan->firstItem() + $loop->index }}</td>
	                            <td class="align-middle"> {{ $value->hinhthucthanhtoan }} </td>

	                       
	                            <td class="align-middle text-right">
	                              <a href="{{ route('admin.hinhthucthanhtoan.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
	                                <i class="fa fa-pencil-alt"></i>
	                                <span class="sr-only">Edit</span>
	                              </a>
	                               <a   href="{{ route('admin.hinhthucthanhtoan.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
                       {{ $hinhthucthanhtoan->links() }}
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
