@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm hình ảnh ({{$sanpham->tensanpham}}) </h1>
                </div>
            <!-- /title and toolbar -->
        </header>
        <div class="page-section">
          <!-- .card -->
              <section class="card card-fluid">
                <!-- .card-body -->
                <div class="card-body">
                  <div class="table-responsive">

                    <!-- form .needs-validation -->
                    <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.hinhanh.them',['tensanpham_slug'=>$sanpham->tensanpham_slug]) }}" method="post" enctype="multipart/form-data">
                      @csrf

                     
                       
                        <div class="row">
                             <div class="col-md-12">
                                <label for="phanhang_id">Hình Ảnh Sản Phẩm<abbr title="Required">*</abbr></label>
                                <input type="file" name="hinhanh[]" multiple class="form-control @error('hinhanh') is-invalid @enderror" accept="hinhanh/*">
                                @error('hinhanh')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                           

                        </div>
                        
                      <!-- /.form-row -->
                        <hr class="mb-4">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Thêm</button>
                    </form>
                  <!-- /form .needs-validation -->
                  </div>
                </div>
              </section>
               
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div> 
</div> 

@endsection
