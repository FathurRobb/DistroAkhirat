<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\SupplierController;

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

Route::get('/', [LoginController::class,'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/kasir', [KasirController::class,'index']);
    Route::post('/kasir/addproduct/{id}', [KasirController::class,'addProductCart']);
    Route::post('/kasir/removeproduct/{id}', [KasirController::class,'removeProductCart']);
    Route::post('/kasir/clear', [KasirController::class,'clear']);
    Route::post('/kasir/increasecart/{id}', [KasirController::class,'increasecart']);
    Route::post('/kasir/decreasecart/{id}', [KasirController::class,'decreasecart']);
    Route::post('/kasir/bayar', [KasirController::class,'bayar']);
    Route::post('/kasir/history', [KasirController::class,'history']);
    Route::post('/kasir/laporan/{id}', [KasirController::class,'laporan']);

    Route::get('/gudang', [GudangController::class,'index']);
    Route::post('/gudang/store',[GudangController::class,'saveBrg']);
    Route::post('/gudang/edit',[GudangController::class,'editBrg']);
    Route::post('/gudang/update',[GudangController::class,'updateBrg']);



    Route::get('/jenis',[JenisController::class,'index']);
    Route::get('/supplier',[SupplierController::class,'index']);
    Route::get('/brgMasuk',[GudanginsController::class,'index']);

});

//Gudang's Roles
// Route::post('/tambahBarang',[GudangController::class,'create']);

// Route::get('/kategori','[KategoriController::class,'index]');


