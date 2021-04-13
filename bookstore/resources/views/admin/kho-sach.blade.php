@extends('layout_admin.master')
@section('title', 'Bookstore')
@section('content')
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
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh Sách Sản Phẩm</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      STT
                    </th>
                    <th>
                      Tên Sách
                    </th>
                    <th>
                      Hình
                    </th>
                    <th>
                      Tác Giả
                    </th>
                    <th>
                      Nhà Xuất Bản
                    </th>
                    <th>
                      Đơn Giá
                    </th>
                    <th>
                      Trạng Thái
                    </th>
                    <th>
                      Sửa|Xoá
                    </th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($dssach as $sach)
                  <tr>
                    <td>
                      {{$sach->id}}
                    </td>
                    <td>
                      {{$sach->ten_sach}}
                    </td>
                    <td>
                      <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img" style="width: 200px;height:150px">
                    </td>
                    <td>
                      {{$sach->id_tac_gia}}
                    </td>
                    <td>
                      {{$sach->id_nha_xuat_ban}}
                    </td>
                    <td>
                      {{$sach->don_gia}}
                    </td>
                    <td>
                      {{$sach->trang_thai}}
                    </td>
                    <td>
                    <a href="{{url('admin/cap-nhat-sach')}}/{{$sach->id}}"> <img src="{{URL::asset('storage/icon/create-black-18dp.svg')}}" /></a>|
                    <a href="{{url('admin/destroy')}}/{{$sach->id}}"> <img src="{{URL::asset('storage/icon/delete-black-18dp.svg')}}" /></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-12">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                {{ $dssach->links()}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection