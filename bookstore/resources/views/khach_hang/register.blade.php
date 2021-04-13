@extends('layout.detail')
@section('title', 'Bookstore')
@section('content')
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
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
        <span class="breadcrumb-item active">Register</span>
    </div>
</div>
<section class="static about-sec">
    <div class="container">
        <h1>Đăng Ký </h1>
        <div class="form">
            <form method="POST" action="{{url('khach-hang/dang-ky')}}" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="col-md-12">
                            <input type="text" name="name" value="{{old('name')}}" placeholder=" Tên" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-12">
                            <input type="email" value="{{old('email')}}" name="email" placeholder="Email" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-12">
                            <input type="password"  id="password" name="password" placeholder=" Password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-12">
                            <span id='message'></span>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm_password" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-12">
                            <span id='message'></span>
                            <input type="text" name="dia_chi" placeholder="Địa chỉ" required>
                            <span class="required-star"></span>
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Điện Thoại" required>
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button name="submit" class="btn black">Đăng Ký</button>
                            <h5>not Registered? <a href="{{url('khach-hang/dang-nhap')}}">Login here</a></h5>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Trùng Khớp').css('color', 'green');
  } else 
    $('#message').html('Không Trùng').css('color', 'red');
});
</script>
@endsection