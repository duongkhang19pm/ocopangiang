@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                  <a href="{{ route('doanhnghiep.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang Chủ</a>

                </li>
                <li class="breadcrumb-item active">
                  <a href="{{ route('doanhnghiep.sanpham') }}">Danh Sách</a>
                  
                </li>
              </ol>
            </nav>    
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Thêm Sản Phẩm </h1>
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
                    <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.sanpham.them') }}" method="post" enctype="multipart/form-data">
                      @csrf

                     
                        <div class="row">
                             <div class="col-md-4">
                                <label for="nhomsanpham_id">Nhóm Sản Phẩm<abbr title="Required">*</abbr></label>
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
                         
                             <div class="col-md-4">
                                <label for="loaisanpham_id">Loại Sản Phẩm<abbr title="Required">*</abbr></label>
                                <select class="custom-select d-block w-100 @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
                                    <option value="" >-- Chọn Loại Sản Phẩm--</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn loại sản phẩm . </div>
                                @error('loaisanpham_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                             <div class="col-md-4">
                                <label for="tieuchuan">Tiêu Chuẩn</label>
                                <input type="text" class="form-control @error('tieuchuan') is-invalid @enderror" id="tieuchuan" name="tieuchuan" value="{{ old('tieuchuan') }}" placeholder="Tiêu Chuẩn"  />
                                @error('tieuchuan')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>      
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label for="dieukienluutru">Điều Kiện Lưu Trữ</label>
                                <input type="text" class="form-control @error('dieukienluutru') is-invalid @enderror" id="dieukienluutru" name="dieukienluutru" value="{{ old('dieukienluutru') }}" placeholder="Điều Kiện Lưu Trữ"  />
                                @error('dieukienluutru')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="dieukienvanchuyen">Điều Kiện Vận Chuyễn</label>
                                <input type="text" class="form-control @error('dieukienvanchuyen') is-invalid @enderror" id="dieukienvanchuyen" name="dieukienvanchuyen" value="{{ old('dieukienvanchuyen') }}" placeholder="Điều Kiện Vận Chuyễn"  />
                                @error('dieukienvanchuyen')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>  
                       <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tensanpham">Tên Sản Phẩm<abbr title="Required">*</abbr></label>
                                <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ old('tensanpham') }}" placeholder="Tên Sản Phẩm" required />
                                @error('tensanpham')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="soluong">Số Lượng<abbr title="Required">*</abbr></label>
                                <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ old('soluong') }}" placeholder="Số Lượng" required />
                              
                                @error('soluong')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="dongia">Đơn Giá<abbr title="Required">*</abbr></label>
                                <input type="number" class="form-control @error('dongia') is-invalid @enderror" id="dongia" name="dongia" value="{{ old('dongia') }}" placeholder="Đơn Giá" required />
                              
                                @error('dongia')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nguyenlieu">Nguyên Liệu</label>
                                <input type="text" class="form-control @error('nguyenlieu') is-invalid @enderror" id="nguyenlieu" name="nguyenlieu" value="{{ old('nguyenlieu') }}" placeholder="Nguyên Liệu"  />                        
                                @error('nguyenlieu')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="hansudung">Hạn Sử Dụng</label>
                                <input type="text" class="form-control @error('hansudung') is-invalid @enderror" id="hansudung" name="hansudung" value="{{ old('hansudung') }}" placeholder="Hạng Sử Dụng"  />
                              
                                @error('hansudung')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="hansudungsaumohop">Hạn Sử Dụng Sau Khi Mở</label>
                                <input type="text" class="form-control @error('hansudungsaumohop') is-invalid @enderror" id="hansudungsaumohop" name="hansudungsaumohop" value="{{ old('hansudungsaumohop') }}" placeholder="Hạn Sử Dụng Sau Khi Mở"  />
                              
                                @error('hansudungsaumohop')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="khoiluongrieng">Khối Lượng Riêng<abbr title="Required">*</abbr></label>
                                <input type="text" class="form-control @error('khoiluongrieng') is-invalid @enderror" id="khoiluongrieng" name="khoiluongrieng" value="{{ old('khoiluongrieng') }}" placeholder="Khối Lượng Riêng" required />
                              
                                @error('khoiluongrieng')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="donvitinh_id">Đơn Vị Tính<abbr title="Required">*</abbr></label>
                                <select class="custom-select d-block w-100 @error('donvitinh_id') is-invalid @enderror" id="donvitinh_id" name="donvitinh_id" required>
                                    <option value="" selected disabled>-- Chọn Đơn Vị Tính --</option>
                                    @foreach ($donvitinh as $value)
                                    <option value="{{ $value->id }}">{{ $value->tendonvitinh }}</option>
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
                                    <option value="" >-- Chọn Quy Cách Đóng Gói--</option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn quy cách đóng gói . </div>
                                @error('quycach_id')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>   
                        </div>
                       
                       <hr class="mb-4">

                           
                        <div class="row">
                            <div class="col-md-6">
                                 <label class="form-label" for="hinhanh">Hình Ảnh Sản Phẩm Đại Diện </label>
                                 <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
                                 @error('hinhanh')
                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                 @enderror
                            </div>
                             <div class="col-md-6">
                                <label for="thumuc">Hình Ảnh Sản Phẩm Đính Kèm <abbr title="Required">*</abbr></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" id="ChonHinh"><a href="#hinhanh">Tải ảnh lên <i class="fas fa-upload"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control" id="thumuc" name="thumuc" value="{{ $folder }}" readonly required />
                                </div>
                            </div>
                           

                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
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
                           <div class="col-md-4">
                              <label for="ngaybatdau"> Ngày bắt đầu<span class="text-danger font-weight-bold">*</span></label>
                              <input type="text" class="form-control @error('ngaybatdau') is-invalid @enderror" id="ngaybatdau" name="ngaybatdau" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'" required="required" type="date" value="{{ old('ngaybatdau')}}" placeholder="mm/dd/yyyy"required />
                              
                                @error('ngaybatdau')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                              <label for="ngayketthuc"> Ngày kết thúc</label>
                              <input type="text" class="form-control @error('ngayketthuc') is-invalid @enderror" id="ngayketthuc" name="ngayketthuc" onblur="this.type='text'" onclick="this.type='date'" onfocus="this.type='date'" onmouseout="timeFunctionLong(this)" onmouseover="this.type='date'"type="date" value="{{ old('ngayketthuc')}}" placeholder="mm/dd/yyyy" />
                              
                                @error('ngayketthuc')
                                  <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
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

@endsection
@section('javascript')
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

<script src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
<script>
    var chonHinh = document.getElementById('ChonHinh');
    chonHinh.onclick = function() { uploadFileWithCKFinder(); };
    function uploadFileWithCKFinder()
    {
        CKFinder.modal(
        {
            displayFoldersPanel: false,
            width: 800,
            height: 500
        });
    }
</script>

@endsection