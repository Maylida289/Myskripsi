<?php

use App\Http\Controllers\OperatorPendaftaranTkiController;
use App\Http\Controllers\LoginOperatorController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginMedicalCheckupController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicalCheckupController;
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


// coba routing array assosoatif untuk edit blade tempalate di view
route::get('/',function() {
    return view ('welcome');
});

Route::get('p3mi', function () {
    return view('p3mi');
});

Route::get('dashboardp3mi', function () {
    return view('dashboardp3mi');
});

// Beberapa Routing pada Pendaftaran TKI(Operator)
// ==============================
// 1. untuk tampilan depan
Route::get('pendaftarantki', 'App\Http\Controllers\OperatorPendaftarantkiController@data');
// 2. untuk tambah data
Route::get('pendaftarantki/add', 'App\Http\Controllers\OperatorPendaftarantkiController@add');
// 3. proses untuk handle penambahan data, jadi proses sukses penambahan data dengan query builder di handle menggunakan routing ini.
Route::post('pendaftarantki', 'App\Http\Controllers\OperatorPendaftarantkiController@addProcess');
// 4. untuk edit data
Route::get('pendaftarantki/edit/{id}', 'App\Http\Controllers\OperatorPendaftarantkiController@edit');
// 5. proses untuk handle edit data, jadi proses sukses mengedit data dengan query builder di handle menggunakan routing ini.
Route::patch('pendaftarantki/{id}','App\Http\Controllers\OperatorPendaftarantkiController@editProcess');
// 6. untuk hapus data
Route::delete('pendaftarantki/{id}','App\Http\Controllers\OperatorPendaftarantkiController@delete');



// untuk halaman pendaftaran p3mi
Route::get('pendaftaranp3mi', 'App\Http\Controllers\Pendaftaranp3miController@data');

// Login Operator
Route::get('login-operator', 'App\Http\Controllers\LoginOperatorController@loginOperator');
route::post('post-login-operator',[LoginOperatorController::class,'postlogin'])->name('post-login-operator');
Route::get('logout-operator', 'App\Http\Controllers\LoginOperatorController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-operator']], function () {
    route::get('operator',[OperatorController::class,'data'])->name('operator');
});
// Halaman utama Operator
route::get('main-operator',[OperatorController::class,'mainOperator']);


// Login Admin
Route::get('login-admin', 'App\Http\Controllers\LoginAdminController@loginAdmin');
route::post('post-login-admin',[LoginAdminController::class,'postlogin'])->name('post-login-admin');
Route::get('logout-admin', 'App\Http\Controllers\LoginAdminController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-admin']], function () {
    route::get('admin',[AdminController::class,'dashboard'])->name('admin');
});
// Halaman utama - Admin
route::get('main-admin',[AdminController::class,'mainAdmin']);
// Validasi berkas TKI - Admin
route::get('validation-admin',[AdminController::class,'validationDataTki']);
// Halaman Detail TKI - Admin
Route::get('admin/detail-tki/{id}', 'App\Http\Controllers\AdminController@detailTki');


// Login Medical Checkup
Route::get('login-medical-checkup', 'App\Http\Controllers\LoginMedicalCheckupController@loginMedicalCheckup');
route::post('post-login-medical-checkup',[LoginMedicalCheckupController::class,'postlogin'])->name('post-login-medical-checkup');
Route::get('logout-medical-checkup', 'App\Http\Controllers\LoginMedicalCheckupController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-medical']], function () {
    route::get('medical-checkup',[MedicalCheckupController::class,'dashboard'])->name('medical-checkup');
});
// List TKI - Medical Checkup
route::get('listtki-medical-checkup',[MedicalCheckupController::class,'listDataTki']);
// Halaman Detail TKI - Medical Checkup
Route::get('medical-checkup/detail-tki/{id}', 'App\Http\Controllers\MedicalCheckupController@detailTki');
// Upload Sertifikat - Medical Checkup
Route::post('upload/store/{id}','App\Http\Controllers\MedicalCheckupController@uploadSertifikatKesehatan');


// Login BLK
Route::get('login-blk', 'App\Http\Controllers\LoginBlkController@loginBlk');