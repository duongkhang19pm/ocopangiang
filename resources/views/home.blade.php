@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="card-title">Single Layout</h4>
        </div>
        <div class="card-body">
           @guest
            <p class="lead">
                  <span class="font-weight-bold">Chào Bạn.</span>
                  <span class="d-block text-muted">Vui Lòng Đăng Nhập!.</span>
            </p>
         @else
                <p class="lead">
                  <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span>
                  <span class="d-block text-muted">Chào mừng đền trang quản trị.</span>
                </p>

         @endguest
        </div>
    </div>
</div>
@endsection
