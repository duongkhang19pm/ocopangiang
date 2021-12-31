@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật đơn hàng </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.donhang.sua',['id'=> $donhang->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-4">
                              <label for="hoten">Họ và tên <abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="text" class="form-control @error('hoten') is-invalid @enderror" id="hoten" name="hoten" value="{{ $donhang->hoten }}" required />
                              @error('hoten')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            
                        </div>
                         <div class="col-md-4">
                              <label for="email">Địa chỉ email<abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $donhang->email }}" required />
                              @error('email')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            
                        </div>
                         <div class="col-md-4">
                              <label for="dienthoaigiaohang">Điện thoại giao hàng<abbr title="Bắt buộc nhập">*</abbr></label>
                              <input type="text" class="form-control @error('dienthoaigiaohang') is-invalid @enderror" id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ $donhang->dienthoaigiaohang }}" required />
                              @error('dienthoaigiaohang')
                                <div class="invalid-feedback"><strong><i class="fa fa-exclamation-circle fa-fw"></i> {{ $message }}</strong></div>
                              @enderror
                            
                        </div>
                        
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                          <label for="tinh">Tỉnh/Thành Phố
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('tinh_id') is-invalid @enderror" id="tinh_id" name="tinh_id" required>
                            <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                             @foreach($tinh as $value)
                                <option value="{{ $value->id }}" {{ ($donhang->tinh_id == $value->id) ? 'selected' : '' }}>{{ $value->tentinh }}</option>
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
                                
                                 @foreach($huyen as $value)
                                    <option value="{{ $value->id }}" {{ ($donhang->huyen_id == $value->id) ? 'selected' : '' }}>{{ $value->tenhuyen }}</option>
                                 @endforeach
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
                                @foreach($xa as $value)
                                    <option value="{{ $value->id }}" {{ ($donhang->xa_id == $value->id) ? 'selected' : '' }}>{{ $value->tenxa }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn xã/phường . </div>
                               @error('xa_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="tenduong">Số Đường<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ $donhang->tenduong }}" placeholder="Tên Đường/Số Nhà" required />
                              
                            @error('tenduong')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                     <div class="row">
                        <div class="col-md-6">
                              <label for="hinhthucthanhtoan_id">Hình thức thanh toán
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('hinhthucthanhtoan_id') is-invalid @enderror" id="hinhthucthanhtoan_id" name="hinhthucthanhtoan_id" required>
                                <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                                 @foreach($hinhthucthanhtoan as $value)
                                    <option value="{{ $value->id }}" {{ ($donhang->hinhthucthanhtoan_id == $value->id) ? 'selected' : '' }}>{{ $value->hinhthucthanhtoan }}</option>
                                 @endforeach
                              </select>
                             
                               @error('tinh_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                        </div> 
                        <div class="col-md-6">
                              <label for="tinhtrang_id">Tỉnh/Thành Phố
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('tinhtrang_id') is-invalid @enderror" id="tinhtrang_id" name="tinhtrang_id" required>
                                <option value="" selected disabled>-- Chọn Tỉnh/Thành Phố --</option>
                                 @foreach($tinhtrang as $value)
                                    <option value="{{ $value->id }}" {{ ($donhang->tinhtrang_id == $value->id) ? 'selected' : '' }}>{{ $value->tinhtrang }}</option>
                                 @endforeach
                              </select>
                              
                               @error('tinhtrang_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                        </div>                      
                      </div>

                    <div class="form-group">
                        <label for="ghichu" class="form-label">Ghi chú</label>
                        <textarea class="form-control" id="ghichu" name="ghichu">{{ $donhang->ghichu }}</textarea>
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

@section('javascript')
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('doanhnghiep.donhang.getHuyen') }}?tinh_id=" + tinhID,
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
                        url: "{{ route('doanhnghiep.donhang.getXa') }}?huyen_id=" + huyenID,
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
            // when state dropdown changes
            $('#huyen_id').on('change', function() {

                var huyenID = $(this).val();

                if (huyenID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('getPhi') }}?huyen_id=" + huyenID,
                        success: function(res) {

                            if (res) {
                                $("#phi").empty();
                                $("#phi").append('');
                                $.each(res, function(key, value) {
                                    $("#phi").append('<a>' + value +
                                        '</a>');
                                });

                            } else {

                                $("#phi").empty();
                            }
                        }
                    });
                } else {

                    $("#phi").empty();
                }
            });
      
        });

</script>
@endsection
