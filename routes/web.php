<?php

use App\Http\Controllers\PendaftaranTkiController;
use App\Http\Controllers\LoginOperatorController;
use App\Http\Controllers\AdminController;
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


//tampilan registrasi menggunakan template laravel
Route::get('/main', function () {
    return view('main');
});

// coba routing array assosoatif untuk edit blade tempalate di view
route::get('/',function() {
    return view ('halo');
});

Route::get('/contoh', function () {
    return view ('contoh');
});


Route::get('p3mi', function () {
    return view('p3mi');
});

Route::get('pengecekan', function () {
    return view('pengecekan');
});

Route::get('dashboardp3mi', function () {
    return view('dashboardp3mi');
});

// Beberapa Routing pada Pendaftaran TKI(Operator)
// ==============================
// 1. untuk tampilan depan
Route::get('pendaftarantki', 'App\Http\Controllers\PendaftarantkiController@data');
// 2. untuk tambah data
Route::get('pendaftarantki/add', 'App\Http\Controllers\PendaftarantkiController@add');
// 3. proses untuk handle penambahan data, jadi proses sukses penambahan data dengan query builder di handle menggunakan routing ini.
Route::post('pendaftarantki', 'App\Http\Controllers\PendaftarantkiController@addProcess');
// 4. untuk edit data
Route::get('pendaftarantki/edit/{id}', 'App\Http\Controllers\PendaftarantkiController@edit');
// 5. proses untuk handle edit data, jadi proses sukses mengedit data dengan query builder di handle menggunakan routing ini.
Route::patch('pendaftarantki/{id}','App\Http\Controllers\PendaftarantkiController@editProcess');
// 6. untuk hapus data
Route::delete('pendaftarantki/{id}','App\Http\Controllers\PendaftarantkiController@delete');



// untuk halaman pendaftaran p3mi
Route::get('pendaftaranp3mi', 'App\Http\Controllers\Pendaftaranp3miController@data');

// Login Operator
Route::get('login-operator', 'App\Http\Controllers\LoginOperatorController@loginOperator');
route::post('postlogin',[LoginOperatorController::class,'postlogin'])->name('post-login-operator');
Route::get('logout', 'App\Http\Controllers\LoginOperatorController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-operator']], function () {
    route::get('admin',[AdminController::class,'data'])->name('admin');    
});