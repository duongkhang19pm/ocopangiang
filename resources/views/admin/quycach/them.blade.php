@extends('layouts.admin')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm quy cách đóng gói </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.quycach.them') }}" method="post">
                  @csrf
                  
                 <div class="form-group">
                          <label for="donvitinh_id">Đơn Vị Tính
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('donvitinh_id') is-invalid @enderror" id="donvitinh_id" name="donvitinh_id" required>
                            <option value="">-- Chọn Đơn Vị Tính --</option>
                             @foreach($donvitinh as $value)
                                <option value="{{ $value->id }}">{{ $value->tendonvitinh }}</option>
                             @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn đơn vị tính . </div>
                           @error('donvitinh_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                             @enderror
                        </div>
                  <!-- .form-group -->
                  <div class="form-group">
                      <label for="tenquycach">Tên quy cách đóng gói <span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('tenquycach') is-invalid @enderror" id="tenquycach" name="tenquycach" value="{{ old('tenquycach') }}" placeholder="Quy cách đóng gói" required />
                      
                    @error('tenquycach')
                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                  </div>
                  <!-- /.form-group -->

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
