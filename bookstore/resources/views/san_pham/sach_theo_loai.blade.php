@extends('layout.detail')
@section('title', 'Chi-tiet')
@section('content')
<section class="recomended-sec">
    <div class="container">
        <div class="title">
            <h2>{{$loaisach->ten_loai_sach}}</h2>
            <hr>
        </div>
        <div class="row">
        @foreach($sachtheoloai as $sach)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <img class="rounded mx-auto d-block" src="{{URL::asset('storage/css_js_image_bookstore/')}}/hinh_sach/{{$sach->hinh}}" alt="img" width="150px" height="200px" >
                    <h3>{{$sach->ten_sach}}</h3>
                    <h6><span class="price">{{$sach->don_gia}}</span> / <a href="#">Buy Now</a></h6>
                    <div class="hover">
                        <a href="{{url('sach')}}/{{$sach->ten_url}}-{{$sach->id}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </div>
                </div>
                <br>
            </div>
            @endforeach
        </div>
    
    </div>
</section>
@endsection