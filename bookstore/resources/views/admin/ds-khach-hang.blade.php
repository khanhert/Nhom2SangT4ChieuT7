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
            <h4 class="card-title">Danh Sách Khách Hàng </h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      STT
                    </th>
                    <th>
                      Họ khách hàng 
                    </th>
                    <th>
                      Tên khách hàng 
                    </th>
                    <th>
                      Email 
                    </th>
                    <th>
                      Password
                    </th>
                    <th>
                      Diện thoại 
                    </th>
                    <th>
                      Địa chỉ 
                    </th>
                    <th>
                      Thành viên 
                    </th>
                    
                  </tr>
                </thead>
                <tbody>

                  @foreach($khach_hang as $kh)
                  <tr>
                    <td>
                      {{$kh->id}}
                    </td>
                    <td>
                      {{$kh->ho_khach_hang}}
                    </td>
                    <td>
                      {{$kh->ten_khach_hang}}
                    </td>
                    <td>
                      {{$kh->email}}
                    </td>
                    <td>
                      {{$kh->password}}
                    </td>
                    <td>
                      {{$kh->sdt}}
                    </td>
                    <td>
                      {{$kh->dia_chi}}
                    </td>
                    <td>
                      {{$kh->thanh_vien}}
                    </td>
                    
                    <td>
                    <a href="{{url('admin/cap-nhat-tk')}}/{{$kh->id}}"> <img src="{{URL::asset('storage/icon/create-black-18dp.svg')}}" /></a>|
                    <a href="{{url('admin/xoa-tk')}}/{{$kh->id}}"> <img src="{{URL::asset('storage/icon/delete-black-18dp.svg')}}" /></a>
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
                {{ $khach_hang->links()}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection