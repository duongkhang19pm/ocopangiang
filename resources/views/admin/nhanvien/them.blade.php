@extends('layouts.app')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm nhân viên </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.nhanvien.them') }}" method="post" enctype="multipart/form-data">
                  @csrf

                 <div class="row">
                     <div class="col-md-6">
                          <label for="doanhnghiep_id">Doanh Nghiệp
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('doanhnghiep_id') is-invalid @enderror" id="doanhnghiep_id" name="doanhnghiep_id" required>
                            <option value="" >-- Chọn Doanh Nghiệp --</option>
                             @foreach($doanhnghiep as $value)
                                <option value="{{ $value->id }}">{{ $value->tendoanhnghiep }}</option>
                             @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn doanh nghiệp. </div>
                           @error('doanhnghiep_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                     </div>
                       <div class="col-md-6">
                              <label for="chucvu_id">Chức Vụ
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('chucvu_id') is-invalid @enderror" id="chucvu_id" name="chucvu_id"  required>
                                <option value="" >-- Chọn Chức Vụ --</option>
                                 @foreach($chucvu as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenchucvu }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn chức vụ. </div>
                               @error('chucvu_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                      </div>
                 </div>
                 <hr/>
                  <h4 class="card-title text-center"> Vị Trí </h4>
                  <div class="row">
                       <div class="col-md-3">
                          <label for="tinh">Tỉnh/Thành Phố
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('tinh_id') is-invalid @enderror" id="tinh_id" name="tinh_id" required>
                            <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                             @foreach($tinh as $value)
                                <option value="{{ $value->id }}">{{ $value->tentinh }}</option>
                             @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn tỉnh/thành phố . </div>
                           @error('tinh_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                 
                         <div class="col-md-3">
                                  <label for="huyen">Quận/Huyện
                                    <abbr title="Required">*</abbr>
                                  </label>
                                  <select class="custom-select d-block w-100 @error('huyen_id') is-invalid @enderror" id="huyen_id" name="huyen_id" required>
                                    <option value="" >-- Chọn Quận/Huyện--</option>
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn quận/huyện . </div>
                                   @error('huyen_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                          </div>
                          <div class="col-md-3">
                                  <label for="xa">Xã/Phường
                                    <abbr title="Required">*</abbr>
                                  </label>
                                  <select class="custom-select d-block w-100 @error('xa_id') is-invalid @enderror" id="xa_id" name="xa_id" required>
                                    <option value="" >-- Chọn Xã/Phường --</option>
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn xã/phường . </div>
                                   @error('xa_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                          </div>
                           <div class="col-md-3">
                              <label for="tenduong">Số Đường/Nhà<span class="text-danger font-weight-bold">*</span></label>
                              <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ old('tenduong') }}" placeholder="Tên Đường/Số Nhà" required />
                                  
                                @error('tenduong')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                          </div>
                    </div>
               
                     <hr/>
                   <div class="row">
                       <div class="col-md-3">
                      <label for="tennhanvien">Họ Và Tên<span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('tennhanvien') is-invalid @enderror" id="tennhanvien" name="tennhanvien" value="{{ old('tennhanvien') }}" placeholder="Họ Và Tên Nhân Viên" required />
                      
                        @error('tennhanvien')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="email">Địa Chỉ Email<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Địa Chỉ Email" required />
                          
                            @error('email')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="CMND">CMND/CCCD<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('CMND') is-invalid @enderror" id="CMND" name="CMND" value="{{ old('CMND') }}" placeholder="CMND/CCCD" required />
                          
                            @error('CMND')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="SDT">Điện Thoại<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('SDT') is-invalid @enderror" id="SDT" name="SDT" value="{{ old('SDT') }}" placeholder="Điện Thoại" required />
                          
                            @error('SDT')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                 <hr/>
                  <div class="row">
                    <div class="col-md-4">
                      <label class="d-block">Giới Tính</label>
                      <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="gioitinh" id="0" value="0">
                        <label class="custom-control-label" for="0">Nữ</label>
                      </div>
                      
                      <div class="custom-control custom-control-inline custom-radio">
                        <input type="radio" class="custom-control-input" name="gioitinh" id="1" checked="" value="1">
                        <label class="custom-control-label" for="1">Nam</label>
                      </div>
                    </div>
                      <div class="col-md-4">
                      <label for="ngaysinh"> Ngày sinh<span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('ngaysinh') is-invalid @enderror" id="ngaysinh" name="ngaysinh" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ old('ngaysinh')}}" placeholder="mm/dd/yyyy"required  />
                      
                        @error('ngaysinh')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                      <div class="col-md-4">
                         <label class="form-label" for="hinhanh">Hình ảnh Nhân Viên </label>
                         <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
                         @error('hinhanh')
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
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.nhanvien.getHuyen') }}?tinh_id=" + tinhID,
                        success: function(res) {

                            if (res) {

                                $("#huyen_id").empty();
                                $("#huyen_id").append('<option>--Chọn Quận/Huyện--</option>');
                                $.each(res, function(key, value) {
                                    $("#huyen_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#huyen_id").empty();
                            }
                        }
                    });
                } else {

                    $("#huyen_id").empty();
                    $("#xa_id").empty();
                }
            });

            // when state dropdown changes
            $('#huyen_id').on('change', function() {

                var huyenID = $(this).val();

                if (huyenID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.nhanvien.getXa') }}?huyen_id=" + huyenID,
                        success: function(res) {

                            if (res) {
                                $("#xa_id").empty();
                                $("#xa_id").append('<option>--Chọn Xã/Phường--</option>');
                                $.each(res, function(key, value) {
                                    $("#xa_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#xa_id").empty();
                            }
                        }
                    });
                } else {

                    $("#xa_id").empty();
                }
            });
        });
</script>

@endsection
