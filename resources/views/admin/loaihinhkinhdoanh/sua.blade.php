@extends('layouts.admin')

@section('pagetitle')
  Cập Nhật Loại Hình Kinh Doanh
@endsection
@section('content')
<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật loại hình kinh doanh </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.loaihinhkinhdoanh.sua',['id'=> $loaihinhkinhdoanh->id]) }}" method="post">
                  @csrf
                  <!-- .form-group -->
                  <div class="form-group">
                      <label for="tenloaihinhkinhdoanh">Tên chức vụ <span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('tenloaihinhkinhdoanh') is-invalid @enderror" id="tenloaihinhkinhdoanh" name="tenloaihinhkinhdoanh" value="{{$loaihinhkinhdoanh->tenloaihinhkinhdoanh}}"required />
                     
                    @error('tenloaihinhkinhdoanh')
                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                  </div>
                  <!-- /.form-group -->

                  <!-- /.form-row -->
                  <hr class="mb-4">
                 
                    <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-2"></i>Cập Nhật</button>
               
                  
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