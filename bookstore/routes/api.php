<?php

use App\Http\Controllers\API\Loai_SachController;
use App\Http\Controllers\API\Nha_Xuat_BanController;
use App\Http\Controllers\API\SachController;
use App\Http\Controllers\API\Tac_GiaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/')->group(function () {
        
Route::get('/sach', [SachController::class, 'index']);
Route::get('/sach/{id}', [SachController::class, 'show']);
Route::post('/sach',[SachController::class,'store']);
Route::put('/sach/{id}', [SachController::class, 'update']);
Route::delete('/sach/{id}', [SachController::class, 'destroy']);



Route::get('/loai_sach', [Loai_SachController::class, 'index']);
Route::get('/loai_sach/{id}', [Loai_SachController::class, 'show']);
Route::post('/loai_sach',[Loai_SachController::class,'store']);
Route::delete('/loai_sach/{id}', [Loai_SachController::class, 'destroy']);
Route::put('/loai_sach/{id}', [Loai_SachController::class, 'update']);

Route::get('/tac_gia', [Tac_GiaController::class, 'index']);
Route::get('/tac_gia/{id}', [Tac_GiaController::class, 'show']);
Route::post('/tac_gia',[Tac_GiaController::class,'store']);
Route::delete('/tac_gia/{id}',[Tac_GiaController::class, 'destroy']);
Route::put('/tac_gia/{id}', [Tac_GiaController::class, 'update']);

Route::get('/nxb', [Nha_Xuat_BanController::class, 'index']);
Route::get('/nxb/{id}', [Nha_Xuat_BanController::class, 'show']);
Route::post('/nxb',[Nha_Xuat_BanController::class,'store']);
Route::delete('/nxb/{id}', [Nha_Xuat_BanController::class, 'destroy']);
Route::put('/nxb/{id}', [Nha_Xuat_BanController::class, 'update']);
   
});

