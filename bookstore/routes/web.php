<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NhaXBController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\ThongKeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [SanPhamController::class, 'index']);
    Route::get('/search', [SanPhamController::class, 'search']);
});
Route::prefix('/sach')->group(function () {

    Route::get('/thu-vien-sach', [SanPhamController::class, 'DanhMuc']);
    Route::get('/thu-vien-sach/{id}', [SanPhamController::class, 'SachTheoLoai']);
    Route::get('/{id}', [SanPhamController::class, 'show']);
});
Route::prefix('/khach-hang')->group(function () {


    //
    Route::get('/dang-nhap', [KhachHangController::class, 'Login']);
    Route::post('/dang-nhap', [KhachHangController::class, 'PostLogin']);
    Route::get('/dang-xuat', [KhachHangController::class, 'Logout']);
    Route::get('/dang-ky', [KhachHangController::class, 'Register']);
    Route::post('/dang-ky', [KhachHangController::class, 'store']);
    Route::get('tien-hanh-dat-hang', [KhachHangController::class, 'TienHanhDatHang']);
    Route::post('them-vao-gio-hang/{id}', [KhachHangController::class, 'ThemVaoGioHang']);
    Route::get('thong-tin-gio-hang', [KhachHangController::class, 'ThongTinGioHang']);
    Route::post('cap-nhat-gio-hang', [KhachHangController::class, 'CapNhatGioHang']);
    Route::get('xoa-mat-hang/{id}', [KhachHangController::class, 'XoaMatHang']);
    Route::get('thong-tin-khach-hang', [KhachHangController::class, 'create']);
    Route::post('thong-tin-khach-hang', [KhachHangController::class, 'DonHang']);
    Route::get('don-dat-hang/{id}', [KhachHangController::class, 'ChiTietDonDatHang']);
});
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'Login']);
    Route::post('/', [AdminController::class, 'postLogin']);
    Route::get('/logout', [AdminController::class, 'Logout']);
    Route::get('/Home', [AdminController::class, 'index']);

    Route::get('/kho-sach', [AdminController::class, 'Kho_sach']);
    Route::get('/them-sach', [AdminController::class, 'create']);
    Route::post('/them-sach', [AdminController::class, 'store']);
    Route::get('/cap-nhat-sach/{id}', [AdminController::class, 'edit']);
    Route::put('/cap-nhat-sach/{id}', [AdminController::class, 'update']);
    Route::get('/destroy/{id}', [AdminController::class, 'destroy']);
    Route::get('/ds-tg', [AdminController::class, 'DsTG']);
    Route::get('/ds-nxb', [AdminController::class, 'DsNXB']);
    Route::get('/ds-kh', [AdminController::class, 'DS_khach_hang']);
    Route::get('/ds-kh-vip', [AdminController::class, 'DS_khach_hang_vip']);
    Route::get('/ds-don-hang', [AdminController::class, 'DS_Don_Hang']);

    Route::get('/cap-nhat-tk/{id}', [KhachHangController::class, 'edit']);
    Route::put('/cap-nhat-tk/{id}', [KhachHangController::class, 'update']);
    Route::get('/xoa-tk/{id}', [KhachHangController::class, 'destroy']);
    Route::get('/cap-nhat-tk-vip/{id}', [KhachHangController::class, 'edit_kh_vip']);
    Route::put('/cap-nhat-tk-vip/{id}', [KhachHangController::class, 'update_kh_vip']);
    Route::get('/xoa-tk-vip/{id}', [KhachHangController::class, 'xoa_tk_vip']);


    Route::get('/them-nxb', [NhaXBController::class, 'create']);
    Route::post('/them-nxb', [NhaXBController::class, 'store']);
    Route::get('/cap-nhat-nxb/{id}', [NhaXBController::class, 'edit']);
    Route::put('/cap-nhat-nxb/{id}', [NhaXBController::class, 'update']);
    Route::get('/xoa-nxb/{id}', [NhaXBController::class, 'destroy']);

    Route::get('/them-tg', [TacGiaController::class, 'create']);
    Route::post('/them-tg', [TacGiaController::class, 'store']);
    Route::get('/cap-nhat-tg/{id}', [TacGiaController::class, 'edit']);
    Route::put('/cap-nhat-tg/{id}', [TacGiaController::class, 'update']);
    Route::get('/xoa-tg/{id}', [TacGiaController::class, 'destroy']);
});
Route::get('/redirect', [KhachHangController::class, 'redirectToGoogle']);
Route::get('/auth/callback/', [KhachHangController::class, 'handleGoogleCallback']);
Route::get('/auth/home', [KhachHangController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
