@extends('layout_admin.master')
@section('title', 'Bookstore')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
    <div class="col-md-12">
    @if(count($errors)>0)
    <div class="alert alert-danger">
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
  </div>

      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm Sách</h4>
            <form class="forms-sample" method="POST" action="{{URL('admin/them-sach')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <div class="form-group">
                <label>Tên Sách:</label>
                <input type="text" class="form-control" name="ten_sach" id="ten_sach" value="{{old('ten_sach')}}" placeholder="Nhập tên Sách">
              </div>
              <div class="form-group">
                <label>Tên url:</label>
                <input type="text" name="ten_url" id="ten_url">
              </div>

              <div class="form-group">
                <label>Hìnhh:</label>
                <input type="file" class="form-control" name="hinh">
              </div>
              <div class="form-group">
                <label>Đơn Giá:</label>
                <input type="number" class="form-control" name="don_gia" value="{{old('don_gia')}}">
              </div>
              <div class="form-group">
                <label>Ngày Xuất Bản:</label>
                <input type="text" class="form- control" name="ngay_xuat_ban" value="{{old('ngay_xuat_ban')}}">
              </div>
              <div class="form-group">
                <label>Giới Thiệu:</label>
                <textarea name="gioi_thieu" class="ckeditor" value="{{old('gioi_thieu')}}"></textarea>
              </div>
              <div class="form-inline">
                <div class="form-group">
                  <label>Loại Sách:</label>
                  <select name="ma_loai">
                    @foreach($dsLoaiSach as $lsach)
                    <option value="{{$lsach->id}}" @if($lsach->id==old('ma_loai'))
                      selected="selected"@endif>
                      {{$lsach->ten_loai_sach}}
                    </option>
                    @endforeach
                  </select>
                </div>
                &nbsp;
                <div class="form-group">
                  <label>Nhà Xuất Bản:</label>
                  <select name="ma_nha_xuat_ban">
                    @foreach($NXB as $nxb)
                    <option value="{{$nxb->id}}" @if($nxb->id==old('ma_nha_xuat_ban'))
                      selected="selected"@endif>
                      {{$nxb->ten_nha_xuat_ban}}
                    </option>
                    @endforeach
                  </select>
                </div>
                &nbsp;
                <div class="form-group">
                  <label>Tác Giả:</label>
                  <select name="ma_tac_gia">
                    @foreach($TG as $tg)
                    <option value="{{$tg->id}}" @if($tg->id==old('ma_tac_gia'))
                      selected="selected"@endif>
                      {{$tg->ten_tac_gia}}
                    </option>
                    @endforeach
                  </select>
                </div>

              </div>
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label"></label>
                <input type="checkbox" class="form-check-input" name="trang_thai" <?php echo old('trang_thai') ? 'checked="checked"' : "" ?> value="1" />
                Trang thai

              </div>
              <button type="submit" class="btn btn-primary mr-2">Thêm Sách</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $("#ten_sach").blur(function() {
      var tsp = $("#ten_sach").val();
      var tsp_url = "";
      if (tsp.length > 0) {
        tsp_url = removeVietnameseTones(tsp);
      }
      $("#ten_url").val(tsp_url);
    });
  });

  function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g, " ");
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
    str = str.replace(" ", "-");
    str = str.replace(/\s+/g, "-");
    str=str.toLowerCase();
    return str;
  }
</script>
<script src="{{URL::asset('storage/ckeditor/ckeditor.js') }}"></script>
@endsection