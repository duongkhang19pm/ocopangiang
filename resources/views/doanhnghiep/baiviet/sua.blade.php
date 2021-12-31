@extends('layouts.doanhnghiep')
@section('content')

<div class="wrapper">
   <div class="page"><div class="sidebar-backdrop"></div>
      <div class="page-inner">
        <!-- .card-body -->
        <header class="page-title-bar">
               
         
                <div class="d-md-flex align-items-md-start">
                  <h1 class="page-title mr-sm-auto"> Cập nhật bài viết </h1>
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
                <form class="needs-validation was-validated" novalidate="" action="{{ route('doanhnghiep.baiviet.sua',['id'=> $baiviet->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                       <div class="col-md-6">
                          <label for="chude_id">Chủ Đề
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100 @error('chude_id') is-invalid @enderror" id="chude_id" name="chude_id" required>
                            <option value="" selected disabled>-- Chọn Chủ Đề --</option>
                            @foreach ($chude as $value)
                            <option value="{{ $value->id }}" {{ ($baiviet->chude_id == $value->id) ? 'selected' : '' }}>{{ $value->tenchude }}</option>
                        @endforeach
                          </select>
                          <div class="invalid-feedback">Vui lòng chọn chủ đề . </div>
                           @error('chude_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                 
                        <div class="col-md-6">
                          <label for="tieude">Tiêu Đề<span class="text-danger font-weight-bold">*</span></label>
                          <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude" name="tieude" value="{{ $baiviet->tieude }}" placeholder="Tiêu đề" required />
                          
                            @error('tieude')
                              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                         
                    </div>
                
                   
                 <hr/>
                 
                  <div class="form-group">
                      <label for="tomtat" class="form-label">Tóm Tắt</label>
                      <textarea class="form-control" id="tomtat" name="tomtat" >{{ $baiviet->tomtat }}</textarea>
                      
                   
                  </div>
                   <div class="form-group">
                      <label for="noidung" class="form-label">Nội Dung</label>
                      <textarea class="form-control" id="noidung" name="noidung">{{ $baiviet->noidung }}</textarea>
                      
                   
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

<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#noidung'), {
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
      <script>
        ClassicEditor
            .create(document.querySelector('#tomtat'), {
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


