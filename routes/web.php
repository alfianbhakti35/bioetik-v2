<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/assesment', [ AssesmentController::class, "index_view" ])->name('assesment');
    Route::view('/assesment/new', "pages.assesment.assesment-new")->name('assesment.new');
    Route::view('/assesment/edit/{assesmentId}', "pages.assesment.assesment-edit")->name('assesment.edit');

    Route::get('/mahasiswa', [ MahasiswaController::class, "index_view" ])->name('mahasiswa');
    Route::view('/mahasiswa/new', "pages.mahasiswa.mahasiswa-new")->name('mahasiswa.new');
    Route::view('/mahasiswa/edit/{mahasiswaId}', "pages.mahasiswa.mahasiswa-edit")->name('mahasiswa.edit');

    Route::get('/rekamMedik', [ RekamMedikController::class, "index_view" ])->name('rekamMedik');
    Route::view('/rekamMedik/new', "pages.rekamMedik.rekamMedik-new")->name('rekamMedik.new');
    Route::view('/rekamMedik/edit/{rekamMedikId}', "pages.rekamMedik.rekamMedik-edit")->name('rekamMedik.edit');

    Route::get('/konsultasi', [ KonsultasiController::class, "index_view" ])->name('konsultasi');
    Route::view('/konsultasi/new', "pages.konsultasi.konsultasi-new")->name('konsultasi.new');
    Route::view('/konsultasi/edit/{konsultasiId}', "pages.konsultasi.konsultasi-edit")->name('konsultasi.edit');
});
