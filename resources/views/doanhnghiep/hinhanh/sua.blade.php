@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật hình ảnh</h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.hinhanh.sua',['id'=> $hinhanh->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        @if(!empty($hinhanh->hinhanh))
                             <img class="d-block rounded" src="{{env('APP_URL').'/storage/app/'.$hinhanh->hinhanh}}" width="100" />
                             <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                         @endif
                    <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $hinhanh->hinhanh }}" />
                     @error('hinhanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                     @enderror
                         
                      </div>
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


