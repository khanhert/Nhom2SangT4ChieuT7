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
            <h4 class="card-title">Thêm Nhà Xuất Bản </h4>
            <form class="forms-sample" method="POST" action="{{URL('admin/cap-nhat-nxb')}}/{{$NXB->id}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              {{method_field('PUT')}}
              <div class="form-group">
                <label>Tên Nhà Xuất Bản :</label>
                <input type="text" class="form-control" name="ten_nha_xuat_ban" id="ten_nha_xuat_ban" value="{{$NXB->ten_nha_xuat_ban}}" placeholder="Nhập tên Nhà Xuất Bản ">
              </div>
              <div class="form-group">
                <label>Địa chỉ  :</label>
                <input type="text" class="form-control" name="dia_chi" id="dia_chi" value="{{$NXB->dia_chi}}" placeholder="Nhập tên Nhà Xuất Bản ">
              </div>
              <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" class="form-control" name="dien_thoai" value="{{$NXB->dien_thoai}}">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form- control" name="email" value="{{$NXB->email}}">
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
