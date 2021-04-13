@extends('layout.detail')
@section('title', 'Chi-tiet')
@section('content')
<section class="recomended-sec">
    <div class="container">
        <div class="title">
            <h2>Danh Mục Tổng Hợp</h2>
            <hr>
        </div>
        <div class="row">
            @foreach($loaisach as $ls)
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <h3>{{$ls->ten_loai_sach}}</h3>
                    <div class="hover">
                        <a href="{{url('sach/thu-vien-sach')}}/{{$ls->ten_url }}-{{$ls->id}}" >
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