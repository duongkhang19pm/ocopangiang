@extends('layouts.admin')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm đơn vị quản lý </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.donviquanly.them') }}" method="post" enctype="multipart/form-data">
                  @csrf

                
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
                       
                      <div class="col-md-6">
                          <label for="tendonviquanly">Tên Đơn Vị Quản lý <span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tendonviquanly') is-invalid @enderror" id="tendonviquanly" name="tendonviquanly" value="{{ old('tendonviquanly') }}" placeholder="Tên Đơn Vị Quản Lý" required />
                          
                            @error('tendonviquanly')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-6">
                          <label for="tenthutruong">Tên Thủ Trưởng <span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tenthutruong') is-invalid @enderror" id="tenthutruong" name="tenthutruong" value="{{ old('tenthutruong') }}" placeholder="Tên Đơn Vị Quản Lý" required />
                          
                            @error('tenthutruong')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                   <hr/>
                  <!-- .form-group -->
                 <div class="row">
                        <div class="col-md-4">
                          <label for="email">Địa Chỉ Email<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Địa Chỉ Email" required />
                          
                            @error('email')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-4">
                          <label for="SDT">Điện Thoại<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('SDT') is-invalid @enderror" id="SDT" name="SDT" value="{{ old('SDT') }}" placeholder="Điện Thoại" required />
                          
                            @error('SDT')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                       <div class="col-md-4">
                          <label for="website">Website Đơn Vị</label>
                          <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="Website Đơn Vị"  />
                          
                            @error('website')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                </div>
                 <hr/>
                  <div class="row">
                      
                      <div class="col-md-12">
                         <label class="form-label" for="hinhanh">Hình ảnh </label>
                         <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
                         @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                         @enderror
                     </div>
                  </div>
                   <hr/>
                  
                  <!-- /.form-group -->
                  <div class="form-group">
                      <label for="gioithieu" class="form-label">Giới Thiệu</label>
                      <textarea class="form-control" id="gioithieu" name="gioithieu"></textarea>
                      
                   
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
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.donviquanly.getHuyen') }}?tinh_id=" + tinhID,
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
                        url: "{{ route('admin.donviquanly.getXa') }}?huyen_id=" + huyenID,
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
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#gioithieu'), {
                toolbar: {
                    items: [
                        'undo',
                        'redo',
                        '|',
                        'fontColor',
                        'highlight',
                        '|',
                        'bold',
                        'underline',
                        'italic',
                        'subscript',
                        'superscript',
                        'removeFormat',
                        '|',
                        'alignment',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'link',
                        'codeBlock',
                        'imageInsert',
                        'insertTable',
                        'mediaEmbed',
                        'CKFinder'
                    ]
                },
                language: 'vi',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
