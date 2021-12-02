@extends('layouts.admin')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật loại sản phẩm </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.loaisanpham.sua',['id'=> $loaisanpham->id]) }}" method="post">
                  @csrf
                  
                 <div class="form-group">
                          <label for="nhomsanpham_id">Nhóm sản phẩm
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" required>
                            <option value="">-- Chọn nhóm --</option>
                             @foreach($nhomsanpham as $value)
                                <option value="{{ $value->id }}" {{ ($loaisanpham->nhomsanpham_id == $value->id) ? 'selected' : '' }}>{{ $value->tennhom }}</option>
                             @endforeach
                          </select>
                          <div class="invalid-feedback"> Vui lòng chọn nhóm sản phẩm. </div>
                           @error('nhomsanpham_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                             @enderror
                        </div>
                  <!-- .form-group -->
                  <div class="form-group">
                      <label for="tenloai">Tên loại sản phẩm <span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai" name="tenloai" value="{{$loaisanpham->tenloai}}"required />
                      
                    @error('tenloai')
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


