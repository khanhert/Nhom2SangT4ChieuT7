@extends('layout_admin.master')
@section('title', 'Bookstore')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
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
  </div>

      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm Tác Giả </h4>
            <form class="forms-sample" method="POST" action="{{URL('admin/them-tg')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="form-group">
                <label>Tên Tác Giả :</label>
                <input type="text" class="form-control" name="ten_tac_gia" id="ten_tac_gia" value="{{old('ten_tac_gia')}}" placeholder="Nhập tên Tác Giả ">
              </div>
              <div class="form-group">
                <label>Ngày sinh :</label>
                <input type="date" name="ngay_sinh" id="ngay_sinh">
              </div>

              <div class="form-group">
                <label>Giới Thiệu:</label>
                <textarea name="gioi_thieu" class="ckeditor" value="{{old('gioi_thieu')}}"></textarea>
              </div>
              
              <button type="submit" class="btn btn-primary mr-2">Thêm Tác Giả</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{URL::asset('storage/ckeditor/ckeditor.js') }}"></script>
@endsection

