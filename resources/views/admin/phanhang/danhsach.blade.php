@extends('layouts.admin')

@section('content')

<div class="wrapper">
  <!-- .page -->
  <div class="page"><div class="sidebar-backdrop"></div>
        <!-- .page-inner -->
        <div class="page-inner">
          <!-- .page-title-bar -->
          <header class="page-title-bar">
            
                <a type="button" href="{{route('admin.phanhang.them')}}" class="btn btn-success btn-floated">
                  <i class="fa fa-plus"></i>
                </a>
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Phân Hạng </h1>
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
                             <th >Tên phân hạng</th>
		                          <th >Tên phân hạng không dấu</th>
                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                          </tr>
                        </thead>
                        <!-- /thead -->
                        <!-- tbody -->
                        <tbody>
	                        @foreach($phanhang as $value)
	                          <!-- tr -->
	                          <tr>
	                            
	                            <td class="align-middle">{{ $phanhang->firstItem() + $loop->index }}</td>
	                            <td class="align-middle"> 
                                @if( $value->tenphanhang  == 1)
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
                              @if( $value->tenphanhang  == 2)
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
                              @if( $value->tenphanhang  == 3)
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
                              @if( $value->tenphanhang  == 4)
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
                              @if( $value->tenphanhang  == 5)
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


                               </td>
	                            <td class="align-middle"> {{ $value->tenphanhang_slug }} </td>
	                       
	                            <td class="align-middle text-right">
	                              <a href="{{ route('admin.phanhang.sua', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
	                                <i class="fa fa-pencil-alt"></i>
	                                <span class="sr-only">Edit</span>
	                              </a>
	                               <a   href="{{ route('admin.phanhang.xoa', ['id' => $value->id]) }}" class="btn btn-sm btn-secondary">
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
                       {{ $phanhang->links() }}
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
