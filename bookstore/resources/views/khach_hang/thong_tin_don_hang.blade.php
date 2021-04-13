@extends('layout.detail')
@section('title', 'Bookstore')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="/">Home</a>
        <span class="breadcrumb-item active">Register</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1 style="text-align: center;">Xác Nhận Thông Tin </h1>
        <div class="form">
            <form method="POST" action="{{url('khach-hang/thong-tin-khach-hang')}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <label for="ho_kh"> Tên Khách Hàng:</label>
                            <input type="text" value="{{$khach_hang->name}}" name="ten_kh" placeholder="Tên Người Đặt" required>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="col-md-12">
                        <div class="col-md-12">
                        <label for="dia_chi">Địa chỉ:</label>
                            <input type="text" name="dia_chi" value="{{$khach_hang->dia_chi}}" placeholder="Địa Chỉ" required>
                        </div>
                        <div class="col-md-12">
                        <label for="sdt">Số Điện Thoại:</label>
                            <input type="text" name="sdt" value="{{$khach_hang->phone}}" placeholder="Điện Thoại Người Nhận" required>
                        </div>
                        <div class="col-lg-8 col-md-12">
                                  <button  name="submit" class="btn black">Đặt Hàng</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection