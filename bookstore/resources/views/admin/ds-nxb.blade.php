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
            <h4 class="card-title">Danh Sách Nhà Xuất Bản </h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      STT
                    </th>
                    <th>
                      Tên 
                    </th>
                    <th>
                      Địa chỉ 
                    </th>
                    <th>
                      Điện thoại 
                    </th>
                    <th>
                      Email 
                    </th>
                    <th>
                      Sửa|Xoá
                    </th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($NXB as $nxb)
                  <tr>
                    <td>
                      {{$nxb->id}}
                    </td>
                    <td>
                      <b>{{$nxb->ten_nha_xuat_ban}}</b>
                    </td>
                    <td>
                      {{$nxb->dia_chi}}
                    </td>
                    <td>
                      {{$nxb->dien_thoai}}
                    </td>
                    <td>
                      {{$nxb->email}}
                    </td>
                    <td>
                    <a href="{{url('admin/cap-nhat-nxb')}}/{{$nxb->id}}"> <img src="{{URL::asset('storage/icon/create-black-18dp.svg')}}" /></a>|
                    <a href="{{url('admin/xoa-nxb')}}/{{$nxb->id}}"> <img src="{{URL::asset('storage/icon/delete-black-18dp.svg')}}" /></a>
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
                {{ $NXB->links()}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection