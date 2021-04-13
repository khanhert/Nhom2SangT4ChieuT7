@extends('layout.detail')
@section('title', 'Đơn Hàng')
@section('content')
<div class="content_container" style="margin-top: 50px">
	<div class="featured_title">
		<div class="container">
			<div class="row">
				<div class="col-md-12" style="margin-left: 0px; padding-left: 0px">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Khách hàng</a></li>
							<li class="breadcrumb-item active" aria-current="page">Thông tin đơn đặt hàng</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Đơn đặt hàng</h3>
				<table class="table">
					<tr>
						<td><b>Số hóa đơn</b></td>
						<td>{{ $DonDatHang[0]->id }}</td>
						<td><b>Ngày hóa đơn</b></td>
						<td>{{ $DonDatHang[0]->ngay_dat }}</td>
					</tr>
					<tr>
						<td><b>Khách hàng</b></td>
						<td>{{ $DonDatHang[0]->name}}</td>
						<td><b>Điện thoại</b></td>
						<td>{{ $DonDatHang[0]->phone }}</td>
						<td><b>Email</b></td>
						<td>{{ $DonDatHang[0]->email }}</td>
					</tr>
					<tr>
						<td><b>Địa chỉ</b></td>
						<td colspan="5">{{ $DonDatHang[0]->dia_chi }}</td>
					</tr>
				</table>
				<table class="table">
					<thead>
						<tr style="background-color: #02acea">
							<td>#</td>
							<td>Mã SP</td>
							<td>Tên SP</td>
							<td>Số lượng</td>
							<td>Đơn giá</td>
							<td>Thành tiền</td>
						</tr>
					</thead>

					<tbody>
						<?php $i = 1 ?>
						@foreach ($DonDatHang as $dh)
						<tr>
							<th scope="row"><?php echo $i; ?></th>
							<td>{{ $dh->MaSP }}</td>
							<td>{{ $dh->ten_sach }}</td>
							<td>{{ $dh->so_luong }}</td>
							<td>{{ number_format($dh->don_gia) }}</td>
							<td>{{ number_format($dh->so_luong *$dh->don_gia) }}</td>
						</tr>
						<?php $i++; ?>
						@endforeach
					</tbody>
					<tfoot>
						<tr style="background-color: #02acea">
							<td colspan="3">Tổng </td>
							<td>{{ number_format($DonDatHang[0]->tong_tien) }}</td>
							<td></td>
							<td>{{ number_format($DonDatHang[0]->tong_tien) }}</td>
						</tr>
					</tfoot>
				</table>
			</div>

		</div>
	</div>
</div>
@endsection
@section('script')
@parent
<script>
</script>
@endsection