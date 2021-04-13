@extends('layout_admin.master')
@section('title', 'Bookstore')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
    <div class="col-md-12">
    @if(count($errors)>0)
    <div class="alert alert-success">
      @foreach($errors->all() as $error )
      {{$error}}<br>
      @endforeach
    </div>

    @endif
    @if(session('alert'))
    
    <div class="alert alert-danger">
      {{session('alert')}}
    </div>
    @endif
  </div>

      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Cập nhập tài khoản khách hàng  </h4>
            <form class="forms-sample" method="POST" action="{{URL('admin/cap-nhat-tk')}}/{{$khachhang->id}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              {{method_field('PUT')}}
              <div class="form-group">
                <label>Họ Nhà Khách hàng  :</label>
                <input type="text" class="form-control" name="ho_khach_hang" id="ho_khach_hang" value="{{$khachhang->ho_khach_hang}}" placeholder="Nhập tên Nhà Xuất Bản ">
              </div>
              <div class="form-group">
                <label>Tên Nhà Khách hàng  :</label>
                <input type="text" class="form-control" name="ten_khach_hang" id="ten_khach_hang" value="{{$khachhang->ten_khach_hang}}" placeholder="Nhập tên Nhà Xuất Bản ">
              </div>
              <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="email" class="form-control" name="email" value="{{$khachhang->email}}">
              </div>
              <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" class="form-control" name="dia_chi" value="{{$khachhang->dia_chi}}">
              </div>
              <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" class="form-control" name="sdt" value="{{$khachhang->sdt}}">
              </div>
              
              
              <button type="submit" class="btn btn-primary mr-2">Cập nhật  </button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
