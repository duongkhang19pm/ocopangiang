@extends('layouts.donviquanly')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('donviquanly.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>

                </li>
                <li class="breadcrumb-item active">
                  <a href="{{ route('donviquanly.doanhnghiep') }}">Danh Sách</a>
                  
                </li>
              </ol>
          </nav>     
         
          <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Cập nhật doanh nghiệp </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('donviquanly.doanhnghiep.sua',['id'=> $doanhnghiep->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
                          <label for="loaihinhkinhdoanh_id">Loại Hình Kinh Doanh
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('loaihinhkinhdoanh_id') is-invalid @enderror" id="loaihinhkinhdoanh_id" name="loaihinhkinhdoanh_id" required>
                            <option value="" >-- Chọn Loại Hình Kinh Doanh --</option>
                             @foreach($loaihinhkinhdoanh as $value)
                                <option value="{{ $value->id }}" {{ ($doanhnghiep->loaihinhkinhdoanh_id == $value->id) ? 'selected' : '' }}>{{ $value->tenloaihinhkinhdoanh }}</option>
                             @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn loại hình kinh doanh . </div>
                           @error('loaihinhkinhdoanh_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                       <div class="col-md-6">
                              <label for="mohinhkinhdoanh_id">Mô Hình Kinh Doanh
                                <abbr title="Required">*</abbr>
                              </label>
                              <select class="custom-select d-block w-100 @error('mohinhkinhdoanh_id') is-invalid @enderror" id="mohinhkinhdoanh_id" name="mohinhkinhdoanh_id"  required>
                                <option value="" >-- Chọn Mô Hình Kinh Doanh --</option>
                                 @foreach($mohinhkinhdoanh as $value)
                                    <option value="{{ $value->id }}" {{ ($doanhnghiep->mohinhkinhdoanh_id == $value->id) ? 'selected' : '' }}>{{ $value->tenmohinhkinhdoanh }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn loại hình kinh doanh . </div>
                               @error('mohinhkinhdoanh_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
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
                                <option value="{{ $value->id }}" {{ ($doanhnghiep->xa->huyen->tinh_id == $value->id) ? 'selected' : '' }}>{{ $value->tentinh }}</option>
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
                                    <option value="{{ $value->id }}" {{ ($doanhnghiep->xa->huyen_id == $value->id) ? 'selected' : '' }}>{{ $value->tenhuyen }}</option>
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
                                    <option value="{{ $value->id }}" {{ ($doanhnghiep->xa_id == $value->id) ? 'selected' : '' }}>{{ $value->tenxa }}</option>
                                 @endforeach
                              </select>
                              <div class="invalid-feedback">Vui lòng chọn xã/phường . </div>
                               @error('xa_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                      </div>
                      <div class="col-md-3">
                          <label for="tenduong">Số Đường<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tenduong') is-invalid @enderror" id="tenduong" name="tenduong" value="{{ $doanhnghiep->tenduong }}" placeholder="Tên Đường/Số Nhà" required />
                              
                            @error('tenduong')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                  <div class="row">
                       <div class="col-md-6">
                      <label for="masothue">Mã Số Thuế <span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('masothue') is-invalid @enderror" id="masothue" name="masothue" value="{{ $doanhnghiep->masothue }}" placeholder="Mã Số Thuế" required />
                      
                        @error('masothue')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                      <div class="col-md-6">
                          <label for="tendoanhnghiep">Tên Doanh Nghiệp <span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tendoanhnghiep') is-invalid @enderror" id="tendoanhnghiep" name="tendoanhnghiep" value="{{ $doanhnghiep->tendoanhnghiep }}" placeholder="Tên Doanh Nghiệp" required />
                          
                            @error('tendoanhnghiep')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                      <label for="email">Địa Chỉ Email<span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $doanhnghiep->email }}" placeholder="Địa Chỉ Email" required />
                      
                        @error('email')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                     <div class="col-md-4">
                          <label for="SDT">Điện Thoại<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('SDT') is-invalid @enderror" id="SDT" name="SDT" value="{{ $doanhnghiep->SDT }}" placeholder="Điện Thoại" required />
                          
                            @error('SDT')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                      <div class="col-md-4">
                          <label for="website">Website Doanh Nghiệp</label>
                          <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ $doanhnghiep->website }}" placeholder="Website Doanh Nghiệp"  />
                          
                            @error('website')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                      <label for="ngaythanhlap"> Ngày thành lập<span class="text-danger font-weight-bold">*</span></label>
                      <input type="text" class="form-control @error('ngaythanhlap') is-invalid @enderror" id="ngaythanhlap" name="ngaythanhlap" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ $doanhnghiep->ngaythanhlap}}" placeholder="mm/dd/yyyy"required />
                      
                        @error('ngaythanhlap')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                  </div>
                  <div class="col-md-6">
                     <label class="form-label" for="hinhanh">Hình ảnh doanh nghiệp</label>
                     @if(!empty($doanhnghiep->hinhanh))
                         <img class="d-block rounded" src="{{env('APP_URL').'/storage/app/'.$doanhnghiep->hinhanh}}" width="100" />
                         <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                     @endif
                    <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $doanhnghiep->hinhanh }}" />
                     @error('hinhanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                     @enderror
                 </div>
                  </div>
                  <div class="row">
                       <div class="col-md-6">
                      <label for="kinhdo">Kinh Độ<span class="text-danger font-weight-bold">*</span></label>
                      <input type="float" class="form-control @error('kinhdo') is-invalid @enderror" id="kinhdo" name="kinhdo" value="{{ $doanhnghiep->kinhdo }}" placeholder="Kinh Độ" required />
                      
                        @error('kinhdo')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                  </div>
                  <div class="col-md-6">
                      <label for="vido">Vĩ Độ<span class="text-danger font-weight-bold">*</span></label>
                      <input type="float" class="form-control @error('vido') is-invalid @enderror" id="vido" name="vido" value="{{ $doanhnghiep->vido }}" placeholder="Vỉ Độ" required />
                      
                        @error('vido')
                          <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                  </div>
                  </div>
                  
                  
                  
                 
                  
                   
                 
                  <!-- /.form-group -->
                  <div class="form-group">
                      <label for="gioithieu" class="form-label">Giới Thiệu</label>
                      <textarea class="form-control" id="gioithieu" name="gioithieu">{{ $doanhnghiep->gioithieu }}</textarea>
                      
                   
                  </div>
                

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
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#tinh_id').change(function() {

                var tinhID = $(this).val();

                if (tinhID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('donviquanly.doanhnghiep.getHuyen') }}?tinh_id=" + tinhID,
                        success: function(res) {

                            if (res) {

                                $("#huyen_id").empty();
                                $("#huyen_id").append('<option>--Chọn Quận/Huyện--</option>');
                                $.each(res, function(key, value) {
                                    $("#huyen_id").append('<option value="' + key + '" >' + value +
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
                        url: "{{ route('donviquanly.doanhnghiep.getXa') }}?huyen_id=" + huyenID,
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


