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
                      ID Khách Hàng 
                    </th>
                    <th>
                      Ngày đặt 
                    </th>
                    <th>
                      Tổng tiền 
                    </th>
                    
                    
                  </tr>
                </thead>
                <tbody>

                  @foreach($don_hang as $H_Don)
                  <tr>
                    <td>
                      {{$H_Don->id}}
                    </td>
                    <td>
                      {{$H_Don->id_khach_hang}}
                    </td>
                    <td>
                      {{$H_Don->ngay_dat}}
                    </td>
                    <td>
                      {{$H_Don->tong_tien}}
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
                {{ $don_hang->links()}}
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection