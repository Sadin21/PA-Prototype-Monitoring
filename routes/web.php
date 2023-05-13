<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\KoordinatorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard/login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/dashboard/login', 'index')->name('login');
    Route::post('/dashboard/login', 'authenticate')->name('authenticate');
    Route::get('/dashboard/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard/administrator', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard/administrator/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/dashboard/administrator/detail/{id}', [AdminController::class, 'edit_pengajuan'])->name('admin.edit_pengajuan');
    Route::post('/dashboard/administrator/detail/{id}', [AdminController::class, 'update_pengajuan'])->name('admin.update_pengajuan');
});

Route::group(['middleware' => ['auth', 'koor']], function () {
    Route::get('/dashboard/koordinator', [KoordinatorController::class, 'index'])->name('koor.index');
    Route::get('/dashboard/koordinator/detail/{id}', [KoordinatorController::class, 'detail'])->name('koor.detail');
    Route::get('/dashboard/koordinator/pengajuan', [KoordinatorController::class, 'pengajuan'])->name('koor.pengajuan');

    // Pengajuan Ortu
    Route::get('/dashboard/koordinator/pengajuan/create-ortu', [KoordinatorController::class, 'create_pengajuan_ortu'])->name('koor.create_pengajuan_ortu');
    Route::post('/dashboard/koordinator/pengajuan/create-ortu', [KoordinatorController::class, 'store_pengajuan_ortu'])->name('koor.store_pengajuan_ortu');
    Route::get('/dashboard/koordinator/pengajuan/edit-ortu/{id}', [KoordinatorController::class, 'edit_pengajuan_ortu'])->name('koor.edit_pengajuan_ortu');
    Route::post('/dashboard/koordinator/pengajuan/edit-ortu/{id}', [KoordinatorController::class, 'update_pengajuan_ortu'])->name('koor.update_pengajuan_ortu');
    Route::delete('/dashboard/koordinator/pengajuan/hapus-ortu/{id}', [KoordinatorController::class, 'destroy_pengajuan_ortu'])->name('koor.delete_pengajuan-ortu');

    // Pengajuan Anak
    Route::get('/dashboard/koordinator/pengajuan/create-anak', [KoordinatorController::class, 'create_pengajuan_anak'])->name('koor.create_pengajuan_anak');
    Route::post('/dashboard/koordinator/pengajuan/create-anak', [KoordinatorController::class, 'store_pengajuan_anak'])->name('koor.store_pengajuan_anak');
    Route::get('/dashboard/koordinator/pengajuan/edit-anak/{id}', [KoordinatorController::class, 'edit_pengajuan_anak'])->name('koor.edit_pengajuan_anak');
    Route::post('/dashboard/koordinator/pengajuan/edit-anak/{id}', [KoordinatorController::class, 'update_pengajuan_anak'])->name('koor.update_pengajuan_anak');
    Route::delete('/dashboard/koordinator/pengajuan/hapus-anak/{id}', [KoordinatorController::class, 'destroy_pengajuan_anak'])->name('koor.delete_pengajuan-anak');

    // Laporan Donasi
    Route::get('/dashboard/koordinator/keuangan-donasi', [KoordinatorController::class, 'laporan_donasi'])->name('koor.laporan_donasi');
});

Route::group(['middleware' => ['auth', 'child']], function() {
    Route::get('/dashboard/child', [ChildController::class, 'index'])->name('child.index');
});

