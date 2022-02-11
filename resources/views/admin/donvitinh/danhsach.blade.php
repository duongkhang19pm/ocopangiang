@extends('layouts.admin')

@section('pagetitle')
  Đơn Vị Tính
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
                      <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
                    </li>
                  </ol>
                </nav>
                <a type="button" href="{{route('admin.donvitinh.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto">Đơn Vị Tính</h1>
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
                             <th >Tên đơn vị tính</th>
                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                          </tr>
                        </thead>
                        <!-- /thead -->
                        <!-- tbody -->
                        <tbody>
	                        @foreach($donvitinh as $value)
	                          <!-- tr -->
	                          <tr>
	                            
	                            <td class="align-middle">{{ $donvitinh->firstItem() + $loop->index }}</td>
	                            <td class="align-middle"> {{ $value->tendonvitinh }} </td>
	                       
	                            <td class="align-middle text-right">
	                              <a href="{{ route('admin.donvitinh.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
	                                <i class="fa fa-pencil-alt"></i>
	                                <span class="sr-only">Edit</span>
	                              </a>
	                               <a   href="{{ route('admin.donvitinh.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
                       {{ $donvitinh->links() }}
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
