@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật sản phẩm </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.sanpham.sua',['id'=> $sanpham->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nhomsanpham_id">Nhóm Sản Phẩm<abbr title="Required">*</abbr></label>
                            <select class="custom-select d-block w-100 @error('nhomsanpham_id') is-invalid @enderror" id="nhomsanpham_id" name="nhomsanpham_id" >
                                    <option value="" selected disabled>-- Chọn Nhóm Sản Phẩm --</option>
                                @foreach ($nhomsanpham as $value)
                                    <option value="{{ $value->id }}" {{ ($sanpham->loaisanpham->nhomsanpham_id == $value->id) ? 'selected' : '' }}>{{ $value->tennhom }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn nhóm sản phẩm . </div>
                            @error('nhomsanpham_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                     
                         <div class="col-md-4">
                            <label for="loaisanpham_id">Loại Sản Phẩm<abbr title="Required">*</abbr></label>
                            <select class="custom-select d-block w-100 @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
                                @foreach($loaisanpham as $value)
                                    <option value="{{ $value->id }}" {{ ($sanpham->loaisanpham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenloai }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn loại sản phẩm . </div>
                            @error('loaisanpham_id')
                                 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                       
                             
                    </div>
                    
                    <div class="row">
                         
                       
                        <div class="col-md-4">
                            <label for="tieuchuan">Tiêu Chuẩn<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('tieuchuan') is-invalid @enderror" id="tieuchuan" name="tieuchuan" value="{{ $sanpham->tieuchuan }}" placeholder="Tiêu Chuẩn"  />
                              
                            @error('tieuchuan')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="dieukienluutru">Điều Kiện Lưu Trữ<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('dieukienluutru') is-invalid @enderror" id="dieukienluutru" name="dieukienluutru" value="{{ $sanpham->dieukienluutru }}" placeholder="Điều Kiện Lưu Trữ"  />
                              
                            @error('dieukienluutru')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="dieukienvanchuyen">Điều Kiện Vận Chuyển<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('dieukienvanchuyen') is-invalid @enderror" id="dieukienvanchuyen" name="dieukienvanchuyen" value="{{ $sanpham->dieukienvanchuyen }}" placeholder="Điều Kiện Vận Chuyễn"  />
                              
                            @error('dieukienvanchuyen')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                            
                         <hr/>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="tensanpham">Tên Sản Phẩm<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ $sanpham->tensanpham }}" placeholder="Tên Sản Phẩm" required />
                          
                            @error('tensanpham')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="nguyenlieu">Nguyên Liệu<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('nguyenlieu') is-invalid @enderror" id="nguyenlieu" name="nguyenlieu" value="{{ $sanpham->nguyenlieu }}" placeholder="Nguyên Liệu"  />
                              
                            @error('nguyenlieu')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="soluong">Số Lượng<span class="text-danger font-weight-bold">*</span></label>
                            <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ $sanpham->soluong }}" placeholder="Số Lượng" required />
                              
                            @error('soluong')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="dongia">Đơn Giá<span class="text-danger font-weight-bold">*</span></label>
                            <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ $sanpham->dongia}}" placeholder="Đơn Giá" required />
                              
                            @error('dongia')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="khoiluongrieng">Khối Lượng Riêng<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('khoiluongrieng') is-invalid @enderror" id="khoiluongrieng" name="khoiluongrieng" value="{{ $sanpham->khoiluongrieng }}" placeholder="Khối Lượng Riêng" required />
                              
                             @error('khoiluongrieng')
                                 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="donvitinh_id">Đơn Vị Tính<abbr title="Required">*</abbr></label>
                            <select class="custom-select d-block w-100 @error('donvitinh_id') is-invalid @enderror" id="donvitinh_id" name="donvitinh_id" >
                                    <option value="" selected disabled>-- Chọn Đơn Vị Tính --</option>
                                @foreach ($donvitinh as $value)
                                    <option value="{{ $value->id }}" {{ ($sanpham->quycach->donvitinh_id == $value->id) ? 'selected' : '' }}>{{ $value->tendonvitinh }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn đơn vị tính . </div>
                            @error('donvitinh_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                     
                        <div class="col-md-4">
                            <label for="quycach_id">Quy Cách Đóng Gói<abbr title="Required">*</abbr></label>
                            <select class="custom-select d-block w-100 @error('quycach_id') is-invalid @enderror" id="quycach_id" name="quycach_id" required>
                                @foreach($quycach as $value)
                                    <option value="{{ $value->id }}" {{ ($sanpham->quycach_id == $value->id) ? 'selected' : '' }}>{{ $value->tenquycach }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn quy cách đóng gói . </div>
                            @error('quycach_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                             
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="hansudung">Hạn Sử Dụng<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('hansudung') is-invalid @enderror" id="hansudung" name="hansudung" value="{{ $sanpham->hansudung }}" placeholder="Hạng Sử Dụng"  />
                              
                            @error('hansudung')
                                 <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="hansudungsaumohop">Hạn Sử Dụng Sau Khi Mở<span class="text-danger font-weight-bold">*</span></label>
                            <input type="text" class="form-control @error('hansudungsaumohop') is-invalid @enderror" id="hansudungsaumohop" name="hansudungsaumohop" value="{{ $sanpham->hansudungsaumohop }}" placeholder="Hạn Sử Dụng Sau Khi Mở"  />
                              
                            @error('hansudungsaumohop')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="hinhanh">Hình ảnh sản phẩm </label>
                            @if(!empty($sanpham->hinhanh))
                                <img class="d-block rounded" src="{{env('APP_URL').'/storage/app/'.$sanpham->hinhanh}}" width="100" />
                                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                            @endif
                            <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $sanpham->hinhanh }}" />
                            @error('hinhanh')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                       
                
                        <div class="col-md-4">
                          <label for="phanhang_id">Phân Hạng
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('phanhang_id') is-invalid @enderror" id="phanhang_id" name="phanhang_id" required>
                            <option value="" selected disabled>-- Chọn Phân Hạng --</option>
                            @foreach ($phanhang as $value)
                            <option value="{{ $value->id }}"{{ ($ct->phanhang_id == $value->id) ? 'selected' : '' }}>{{ $value->tenphanhang }}</option>
                        @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn phân hạng  . </div>
                           @error('phanhang_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                          <label for="ngaybatdau"> Ngày bắt đầu<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('ngaybatdau') is-invalid @enderror" id="ngaybatdau" name="ngaybatdau" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ $ct->ngaybatdau}}" placeholder="mm/dd/yyyy"required />
                          
                            @error('ngaybatdau')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                          <div class="col-md-4">
                          <label for="ngayketthuc"> Ngày kết thúc<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('ngayketthuc') is-invalid @enderror" id="ngayketthuc" name="ngayketthuc" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ $ct->ngayketthuc}}" placeholder="mm/dd/yyyy" />
                          
                            @error('ngayketthuc')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                         
                         
                    </div>
                    <div class="form-group">
                        <label for="motasanpham" class="form-label">Mô Tả Sản Phẩm</label>
                        <textarea class="form-control" id="motasanpham" name="motasanpham">{{$sanpham->motasanpham}}</textarea>
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
<script>
        $(document).ready(function(){
            // when country dropdown changes
            $('#nhomsanpham_id').change(function() {

                var NhomID = $(this).val();

                if (NhomID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('doanhnghiep.sanpham.getLoai') }}?nhomsanpham_id=" + NhomID,
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
            $('#donvitinh_id').change(function() {

                var DonViTingID = $(this).val();

                if (DonViTingID) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('doanhnghiep.sanpham.getQuyCach') }}?donvitinh_id=" + DonViTingID,
                        success: function(res) {

                            if (res) {

                                $("#quycach_id").empty();
                                $("#quycach_id").append('<option>--Chọn Quy Cách Đóng Gói--</option>');
                                $.each(res, function(key, value) {
                                    $("#quycach_id").append('<option value="' + key + '">' + value +
                                        '</option>');
                                });

                            } else {

                                $("#quycach_id").empty();
                            }
                        }
                    });
                } else {

                    $("#quycach_id").empty();
                
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


