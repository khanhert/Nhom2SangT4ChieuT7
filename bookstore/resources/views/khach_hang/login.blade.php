@extends('layout.detail')
@section('title', 'Bookstore')
@section('content')
@if(count($errors)>0)
<div class="alert alert-alert">
    @foreach($errors->all() as $error )
    {{$error}}<br>
    @endforeach
</div>

@endif
@if(session('alert'))

<div class="alert alert-success">
    {{session('alert')}}
</div>
@endif
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="{{url('/sach')}}">Home</a>
        <span class="breadcrumb-item active">Login</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1>Đăng Nhập</h1>
        <div class="form">
            <form method="POST" action="{{url('khach-hang/dang-nhap')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="row">
                    <div class="col-md-5">
                        <input type="email" name="email" placeholder="Enter Email" required>
                        <span class="required-star">*</span>
                    </div>
                    <div class="col-md-5">
                        <input type="password" name="password" placeholder="Enter PassWord" required>
                        <span class="required-star">*</span>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <button class="btn black">Login</button>
                        <a href="{{ url('/redirect') }}" class="btn black" type="button" style="height: 48px;" ><img src="{{URL::asset('storage/icon/google-icon.svg')}}" height="30px" width="30px"/></a>
                        <h5>not Registd? <a href="{{url('khach-hang/dang-ky')}}">Đăng ký</a></h5>
                    </div>
                
                </div>
            </form>
        </div>
    </div>
</section>
@endsection