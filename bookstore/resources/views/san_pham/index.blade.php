@extends('layout.master')
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
<section class="recomended-sec">
    <div class="container">
        <div class="title">
            <h2>Danh Sách Bán Chạy</h2>
            <hr>
        </div>
        <div class="row">
            @foreach($DsSachbanchay as $sach)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img">
                    <h3>{{$sach->ten_sach}}</h3>
                    <h6><span class="price">{{$sach->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                        <a href="{{url('/sach')}}/{{$sach->ten_url}}-{{$sach->id}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
                <div class="post_info d-flex flex-row align-items-center justify-content-start">
                    Số lượng:
                    <div class="post_author d-flex flex-row align-items-center justify-content-start">
                        <select id="SoLuong" style="width:110px; text-align: center;" class="form-control">

                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                    |  <a class="btn"id="btnThemVaoGioHang{{$sach->id}}" name="{{$sach->id}}"  href=""><i style="color:black" class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="recomended-sec">
    <div class="container">
        <div class="title">
            <h2>Sách Tiếng Anh</h2>
            <hr>
        </div>
        <div class="row">
            @foreach($DsSachTA as $sach)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img">
                    <h3><a href="#" id="ten_sach">{{$sach->ten_sach}}</a></h3>
                    <h6><span class="price">{{$sach->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                        <a href="{{url('/sach')}}/{{$sach->ten_url}}-{{$sach->id}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>

                        </a>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>
        @foreach($loaisachTA as $loaisach)
        <div class="title">
            <a class="btn btn-outline-primary" href="{{url('sach/thu-vien-sach')}}/{{$loaisach->ten_url}}-{{$loaisach->id}}">Xem Thêm</a>
            <hr>
        </div>
        @endforeach
    </div>

    <div class="container">
        <div class="title">
            <h2>Hài Hước - Truyện Cười</h2>
            <hr>
        </div>
        <div class="row">
            @foreach($DsSachTCHH as $sach)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img">
                    <h3><a href="#" id="ten_sach">{{$sach->ten_sach}}</a></h3>
                    <h6><span class="price">{{$sach->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                        <a href="{{url('/sach')}}/{{$sach->ten_url}}-{{$sach->id}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>

        @foreach($loaisachTA as $loaisach)
        <div class="title">
            <a class="btn btn-outline-primary" href="{{url('sach/thu-vien-sach')}}/{{$loaisach->ten_url}}-{{$loaisach->id}}">Xem Thêm</a>
            <hr>
        </div>
        @endforeach
    </div>
    <div class="container">
        <div class="title">
            <h2>Văn Học Việt Nam</h2>
            <hr>
        </div>
        <div class="row">
            @foreach($DsSachVHVN as $sach)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img">
                    <h3><a href="#" id="ten_sach">{{$sach->ten_sach}}</a></h3>
                    <h6><span class="price">{{$sach->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                        <a href="{{url('/sach')}}/{{$sach->ten_url}}-{{$sach->id}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>
        @foreach($loaisachVHVN as $loaisach)
        <div class="title">
            <a class="btn btn-outline-primary" href="{{url('sach/thu-vien-sach')}}/{{$loaisach->ten_url}}-{{$loaisach->id}}">Xem Thêm</a>
            <hr>
        </div>
        @endforeach
    </div>
</section>

@endsection
@section('script')
@parent
<script>
       $("*[id^=btnThemVaoGioHang]").click(function(){
         	var id= $(this).attr('name');
         	var SoLuong= $("#SoLuong").val();
         	
         	if(SoLuong<=0){
         		alert('Vui lòng chọn Số lượng >0');	
         		return false;
         	}
         	
         	$.ajax({
               type: 'POST',
               dataType: 'json',
               url:'{{ url('khach-hang/them-vao-gio-hang')}}/'+id,
               data: { _token : '<?php echo csrf_token() ?>', SoLuong : SoLuong},
               success:function(data) {
                  	if(data.n==0)
                  		alert('Thêm vào giỏ hàng không thành công');
                  	else
                  	{
                        $('#spangiohang').html(data.n); 
						alert('Thêm vào giỏ hàng thành công');
                  	}
                  	
               },
               error:function(xhr,status,error) {
                  alert(error);
               }
            });
         	return false;
		});
         $(document).ready(function(){
		    $('[data-toggle="popover"]').popover();   
		});
    
</script>
@endsection