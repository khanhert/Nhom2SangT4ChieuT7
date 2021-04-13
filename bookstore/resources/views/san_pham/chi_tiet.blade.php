@extends('layout.detail')
@section('title', 'Chi-tiet')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
        <span class="breadcrumb-item active">Terms and Condition</span>
    </div>
</div>
<section class="product-sec">
    <div class="container">
        <h2>{{$sach->ten_sach}}</h2>
        <div class="row">
        <div class="col-md-6 slider-sec">
                <!-- main slider carousel -->
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img class="post_image" src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid" style="width:650px;height:500px">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                        <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid" style="width:650px;height:500px">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                        <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid" style="width:650px;height:500px">
                        </div>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                            <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" class="img-fluid">
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/main slider carousel-->
            </div>
            <div class="col-md-6 slider-content">
                <p>{!! $sach->gioi_thieu!!}</p>
                <ul>
                    <li>
                        <span class="name">Đơn Giá:</span><span class="clm">:</span>
                        <span class="price">{{ number_format($sach->don_gia)}} đ</span>
                    </li>

                    <li>
                        <span class="name">Ngày Xuất Bản:</span><span class="clm">:</span>
                        <span class="price ">{{$sach->ngay_xuat_ban}}</span>
                    </li>
                    
                    <li>
                        <span class="name">Tác Giả:</span><span class="clm">:</span>
                        @foreach($tac_gia as $tg)
                        <b class="price" value="{{$tg->id}}" @if($tg->id==$sach->id_tac_gia)@endif>{{$tg->ten_tac_gia}}</b>
                        @endforeach
                    </li>
                    <li>
                        <span class="name">Loại Sách:</span><span class="clm">:</span>
                        @foreach($loaisach as $ls)
                        <b style="font-size: small;" class="price" value="{{$ls->id}}" @if($ls->id==$sach->id_loai_sach)@endif>{{$ls->ten_loai_sach}}</b>
                        @endforeach
                    </li>
                    <li>
                        <span class="name">Nhà Xuất Bản:</span><span class="clm">:</span>
                        @foreach($NXB as $nxb)
                        <b style="font-size: small;" class="price" value="{{$nxb->id}}" @if($nxb->id==$sach->id_nha_xuat_ban)@endif>{{$nxb->ten_nha_xuat_ban}}</b>
                        @endforeach
                    </li>
                </ul>
                <div class="post_info d-flex flex-row align-items-center justify-content-start">
                <b>Số lượng</b>
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
                </div>
                <div class="btn-sec">
                        <a class="btn " href="" id="btnThemVaoGioHang" name="{{ $sach->id}}">Thêm vào giỏ hàng</a>
                        <button class="btn black">Mua hàng </button>
                    </div>

            </div>
        </div>
    </div>
</section>
<section class="related-books">
    <div class="container">
        <h2>Có Thể Bạn Sẽ Thích</h2>
        <div class="recomended-sec">
            <div class="row">

                @foreach($Dscotheyeuthich as $sachyt)
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sachyt->hinh}}" alt="img" width="150px" height="200px">
                        <h3>{{$sach->ten_sach}}</h3>
                        <h6><span class="price">{{$sachyt->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                        <div class="hover">
                            <a href="{{url('/sach')}}/{{$sachyt->ten_url}}-{{$sachyt->id}}">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
	@parent
 	<script>
         $("#btnThemVaoGioHang").click(function(){
         	var id= $("#btnThemVaoGioHang").attr('name');
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
						alert('Thêm vào giỏ hàng  thành công');
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