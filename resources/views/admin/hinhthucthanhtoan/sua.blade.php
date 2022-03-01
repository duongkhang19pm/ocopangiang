@extends('layouts.admin')

@section('pagetitle')
  Cập Nhật Hình Thức Thanh Toán
@endsection
@section('content')
<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>

                </li>
                <li class="breadcrumb-item active">
                  <a href="{{ route('admin.hinhthucthanhtoan') }}">Danh Sách</a>
                  
                </li>
              </ol>
            </nav>  
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập Nhật Hình Thức Thanh Toán </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.hinhthucthanhtoan.sua',['id'=> $hinhthucthanhtoan->id]) }}" method="post">
                  @csrf
                  <!-- .form-group -->
                  <div class="form-group">
                      <label for="hinhthucthanhtoan">Tên hình thức thanh toán <span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('hinhthucthanhtoan') is-invalid @enderror" id="hinhthucthanhtoan" name="hinhthucthanhtoan" value="{{$hinhthucthanhtoan->hinhthucthanhtoan}}"required />
                     
                    @error('hinhthucthanhtoan')
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