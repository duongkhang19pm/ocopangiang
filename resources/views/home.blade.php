@extends('layouts.frontend')

@section('pagetitle')
  Khách Hàng
@endsection

@section('content')
  <div class="page">
    <div class="page-inner">
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="{{ route('admin.home') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Trang chủ</a>
            </li>
          </ol>
        </nav>
        <h1 class="page-title">Quản trị hệ thống</h1>
      </header>
      <div class="page-section">
        <h3>Trang chủ Quản Trị Viên đang cập nhật!</h3>
      </div>
    </div>
  </div>
@endsection