@extends('layout.detail')
@section('title','Danh sach loai san pham')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        @if (Cart::count() === 0)
					    <h3 style="text-align: center;">Giỏ hàng rỗng, 
					    	<a href="{{url('/')}}">Tiếp tục mua hàng</a>
					    </h3>
					@else
					    <table class="table" style="margin-top: 15px">
						  <thead class="bg-info">
						    <tr>
						      <th scope="col">image</th>
						      <th scope="col">Tên SP</th>
						      <th scope="col">Số lượng</th>
						      <th scope="col">Xóa</th>
						      <th scope="col">Đơn giá</th>
						      <th scope="col">Thành tiên</th>
						    </tr>
						  </thead>
						  <tbody>
						    @foreach (Cart::content() as $row)
						    <tr>
				           		<td>
				               		<img src="{{ URL::asset('storage/css_js_image_bookstore/hinh_sach/'.$row->options->hinh) }}" class="img-thumbnail" style="max-width: 150px">
				           		</td>
				           		<td>{{ $row->name }}</td>
				           		<td>
			           			<form class="form-inline" method="post" action="{{ url('khach-hang/cap-nhat-gio-hang') }}">
			           				<input type="hidden" name="_token" value="{{csrf_token()}}">
			           				<input type="hidden" value="{{ $row->rowId }}" name="Th_rowID">
				           			<select name="Th_soluong" class="form-control" style="width: 100px; text-align: center;">
				           			@for ($i = 1; $i <= 10; $i++)
				           				@if ($i == ($row->qty*1))
										    <option value="{{ $i }}" selected="selected">{{ $i }}</option>
										@else
										    <option value="{{ $i }}">{{ $i }}</option>
										@endif
									@endfor
				           			</select>
				           			<input type="submit" name="Th_submit" value="Cập nhật" class="btn btn-primary btn-sm">
			           			</form>	

				           		</td>
				           		<td><a href="{{ url('khach-hang/xoa-mat-hang/'.$row->rowId) }}">Xóa</a></td>
				           		<td>{{ number_format($row->price) }} đ</td>
				           		<td>{{ number_format($row->qty*$row->price) }} đ</td>
				       		</tr>
							@endforeach
						  </tbody>
						  <tfoot>
						   		<tr class="bg-info">
						   			<td>Tổng tiền</td>
						   			<td colspan="4">&nbsp;</td>
						   			
						   			<td><?php echo Cart::total(); ?></td>
						   		</tr>
						   		
						   	</tfoot>
						</table>
						<a href="{{url('khach-hang/tien-hanh-dat-hang')}}" class="btn bg-warning"> Tiến hành đặt hàng</a>
					@endif
        </div>
    </div>
</div>
@endsection