@extends('layouts.app')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm sản phẩm </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('admin.sanpham.them') }}" method="post" enctype="multipart/form-data">
                  @csrf

                 
                  <div class="row">
                       <div class="col-md-6">
                          <label for="nhomsanpham_id">Nhóm Sản Phẩm
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" required>
                            <option value="" selected disabled>-- Chọn Nhóm Sản Phẩm --</option>
                            @foreach ($nhomsanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tennhom }}</option>
                        @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn nhóm sản phẩm . </div>
                           @error('nhomsanpham_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                 
                         <div class="col-md-6">
                                  <label for="loaisanpham_id">Loại Sản Phẩm
                                    <abbr title="Required">*</abbr>
                                  </label>
                                  <select class="custom-select d-block w-100 @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
                                    <option value="" >-- Chọn Loại Sản Phẩm--</option>
                                  </select>
                                  <div class="invalid-feedback">Vui lòng chọn loại sản phẩm . </div>
                                   @error('loaisanpham_id')
                                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                          </div>
                         
                    </div>
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
                              <label for="phanhang_id">Phân Hạng
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('phanhang_id') is-invalid @enderror" id="phanhang_id" name="phanhang_id"  required>
                                <option value="" >-- Chọn Phân Hạng --</option>
                                 @foreach($phanhang as $value)
                                    <option value="{{ $value->id }}">{{ $value->tenphanhang }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn phân hạng . </div>
                               @error('phanhang_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                      </div>
                 </div>
                     <hr/>
                   <div class="row">
                       <div class="col-md-3">
                      <label for="tensanpham">Tên Sản Phẩm<span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ old('tensanpham') }}" placeholder="Tên Sản Phẩm" required />
                      
                        @error('tensanpham')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="nguyenlieu">Nguyên Liệu<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('nguyenlieu') is-invalid @enderror" id="nguyenlieu" name="nguyenlieu" value="{{ old('nguyenlieu') }}" placeholder="Nguyên Liệu" required />
                          
                            @error('nguyenlieu')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="soluong">Số Lượng<span class="text-danger font-weight-bold">*</span></label>
                          <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ old('soluong') }}" placeholder="Số Lượng" required />
                          
                            @error('soluong')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="dongia">Đơn Giá<span class="text-danger font-weight-bold">*</span></label>
                          <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}" placeholder="Đơn Giá" required />
                          
                            @error('dongia')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                 <hr/>
                  <div class="row">
                        <div class="col-md-4">
                          <label for="hansudung">Hạn Sử Dụng<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('hansudung') is-invalid @enderror" id="hansudung" name="hansudung" value="{{ old('hansudung') }}" placeholder="Hạng Sử Dụng"  />
                          
                            @error('hansudung')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                       <div class="col-md-4">
                          <label for="hansudungsaumohop">Hạn Sử Dụng Sau Khi Mở<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('hansudungsaumohop') is-invalid @enderror" id="hansudungsaumohop" name="hansudungsaumohop" value="{{ old('hansudungsaumohop') }}" placeholder="Hạn Sử Dụng Sau Khi Mở"  />
                          
                            @error('hansudungsaumohop')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-4">
                         <label class="form-label" for="hinhanh">Hình ảnh sản phẩm </label>
                         <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
                         @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                         @enderror
                     </div>
                  </div>
                   <hr/>
                  <div class="form-group">
                      <label for="motasanpham" class="form-label">Mô Tả Sản Phẩm</label>
                      <textarea class="form-control" id="motasanpham" name="motasanpham"></textarea>
                      
                   
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
            $('#nhomsanpham_id').change(function() {

                var NhomID = $(this).val();

                if (NhomID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.sanpham.getLoai') }}?nhomsanpham_id=" + NhomID,
                        success: function(res) {

                            if (res) {

                                $("#loaisanpham_id").empty();
                                $("#loaisanpham_id").append('<option>--Chọn Loại Sản Phẩm--</option>');
                                $.each(res, function(key, value) {
                                    $("#loaisanpham_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#loaisanpham_id").empty();
                            }
                        }
                    });
                } else {

                    $("#loaisanpham_id").empty();
                
                }
            });

           
        });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#motasanpham'), {
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
