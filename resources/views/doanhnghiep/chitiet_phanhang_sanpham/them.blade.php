@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm chi tiet phan hang </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.chitiet_phanhang_sanpham.them') }}" method="post" enctype="multipart/form-data">
                  @csrf

                 
                  <div class="row">
                       <div class="col-md-6">
                          <label for="sanpham_id">Sản Phẩm
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('sanpham_id') is-invalid @enderror" id="sanpham_id" name="sanpham_id" required>
                            <option value="" selected disabled>-- Chọn Sản Phẩm --</option>
                            @foreach ($sanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tensanpham }}</option>
                        @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn sản phẩm . </div>
                           @error('sanpham_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                         <div class="col-md-6">
                          <label for="phanhang_id">Phân Hạng
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('phanhang_id') is-invalid @enderror" id="phanhang_id" name="phanhang_id" required>
                            <option value="" selected disabled>-- Chọn Phân Hạng --</option>
                            @foreach ($phanhang as $value)
                            <option value="{{ $value->id }}">{{ $value->tenphanhang }}</option>
                        @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn phân hạng  . </div>
                           @error('phanhang_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                 
                         
                         
                    </div>
                
                   <div class="row">
                       <div class="col-md-6">
                          <label for="ngaybatdau"> Ngày bắt đầu<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('ngaybatdau') is-invalid @enderror" id="ngaybatdau" name="ngaybatdau" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ old('ngaybatdau')}}" placeholder="mm/dd/yyyy"required />
                          
                            @error('ngaybatdau')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                          <div class="col-md-6">
                          <label for="ngayketthuc"> Ngày kết thúc<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('ngayketthuc') is-invalid @enderror" id="ngayketthuc" name="ngayketthuc" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ old('ngayketthuc')}}" placeholder="mm/dd/yyyy" />
                          
                            @error('ngayketthuc')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                  </div>
                 <hr/>
                 
                 
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

<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

@endsection
