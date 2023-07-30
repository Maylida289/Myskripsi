<?php

use App\Http\Controllers\OperatorPendaftaranTkiController;
use App\Http\Controllers\LoginOperatorController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginMedicalCheckupController;
use App\Http\Controllers\LoginBlkController;
use App\Http\Controllers\LoginP3miController;
use App\Http\Controllers\LoginPemberangkatanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedicalCheckupController;
use App\Http\Controllers\BlkController;
use App\Http\Controllers\P3miController;
use App\Http\Controllers\PemberangkatanController;
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


// Login Operator
Route::get('login-operator', 'App\Http\Controllers\LoginOperatorController@loginOperator');
route::post('post-login-operator',[LoginOperatorController::class,'postlogin'])->name('post-login-operator');
Route::get('logout-operator', 'App\Http\Controllers\LoginOperatorController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-operator']], function () {
    route::get('operator',[OperatorController::class,'data'])->name('operator');
});
// Halaman utama Operator
route::get('main-operator',[OperatorController::class,'mainOperator']);
// Halaman Hasil Validasi Berkas TKI - Operator
Route::get('validasi-tki-operator', 'App\Http\Controllers\OperatorController@validasiTki');
// Fungsi Upload KTP - Operator
Route::post('upload-ktp/store-operator/{id}','App\Http\Controllers\Operatorontroller@uploadKtp');
// Daftar P3MI - Operator
Route::get('pendaftaranp3mi/add', 'App\Http\Controllers\OperatorPendaftaranP3miController@addP3mi');
Route::post('pendaftaranp3mi', 'App\Http\Controllers\OperatorPendaftaranP3miController@addProcess');
// Halaman Pemberangkatan - Operator
Route::get('pemberangkatan-operator', 'App\Http\Controllers\OperatorController@pemberangkatan');
// Halaman Detail Pemberangkatan - Operator
Route::get('pemberangkatan/operator/detail-tki/{id}', 'App\Http\Controllers\OperatorController@detailPemberangkatanTki');
// Halaman List P3MI - Operator
Route::get('list-p3mi-operator', 'App\Http\Controllers\OperatorController@listP3mi');



// Halaman List Total TKI - Operator
Route::get('list-total-tki-operator', 'App\Http\Controllers\OperatorController@listTki');
// Halaman Detail TKI - Operator
Route::get('list-total-tki/operator/detail-tki/{id}', 'App\Http\Controllers\OperatorController@detailTki');
// Halaman List Total Medical - Operator
Route::get('list-total-medical-operator', 'App\Http\Controllers\OperatorController@listMedical');
// Halaman Detail Medical - Operator
Route::get('list-total-medical/operator/detail-medical/{id}', 'App\Http\Controllers\OperatorController@detailMedical');
// Halaman List Total BLK - Operator
Route::get('list-total-blk-operator', 'App\Http\Controllers\OperatorController@listBlk');
// Halaman Detail BLK - Operator
Route::get('list-total-medical/operator/detail-blk/{id}', 'App\Http\Controllers\OperatorController@detailBlk');
// Halaman List Total BLK - Operator
Route::get('list-total-berangkat-operator', 'App\Http\Controllers\OperatorController@listBerangkat');
// Halaman Detail BLK - Operator
Route::get('list-total-berangkat/operator/detail-blk/{id}', 'App\Http\Controllers\OperatorController@detailBerangkat');

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
// Routing Approved - admin
Route::get('validasi-tki/approved/{id}', 'App\Http\Controllers\AdminController@approved');
// Routing Rejected - admin
Route::get('validasi-tki/rejected/{id}/{information}', 'App\Http\Controllers\AdminController@rejected');


// Halaman List Total TKI - Admin
Route::get('list-total-tki-admin', 'App\Http\Controllers\AdminController@listTki');
// Halaman Detail TKI - Admin
Route::get('list-total-tki/admin/detail-tki/{id}', 'App\Http\Controllers\AdminController@detailTki');
// Halaman List Total Medical - Admin
Route::get('list-total-medical-admin', 'App\Http\Controllers\AdminController@listMedical');
// Halaman Detail Medical - Admin
Route::get('list-total-medical/admin/detail-medical/{id}', 'App\Http\Controllers\AdminController@detailMedical');
// Halaman List Total BLK - Admin
Route::get('list-total-blk-admin', 'App\Http\Controllers\AdminController@listBlk');
// Halaman Detail BLK - Admin
Route::get('list-total-medical/admin/detail-blk/{id}', 'App\Http\Controllers\AdminController@detailBlk');
// Halaman List Total Berangkat - Admin
Route::get('list-total-berangkat-admin', 'App\Http\Controllers\AdminController@listBerangkat');
// Halaman Detail Berangkat - Admin
Route::get('list-total-berangkat/admin/detail-blk/{id}', 'App\Http\Controllers\AdminController@detailBerangkat');


// Login Medical Checkup
Route::get('login-medical-checkup', 'App\Http\Controllers\LoginMedicalCheckupController@loginMedicalCheckup');
route::post('post-login-medical',[LoginMedicalCheckupController::class,'postlogin'])->name('post-login-medical');
Route::get('logout-medical-checkup', 'App\Http\Controllers\LoginMedicalCheckupController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-medical']], function () {
    route::get('medical-checkup',[MedicalCheckupController::class,'dashboard'])->name('medical-checkup');
});
// Halaman Dashbiard 
route::get('medical-checkup-dashboard',[MedicalCheckupController::class,'dashboard'])->name('medical-checkup');
// List TKI - Medical Checkup
route::get('listtki-medical-checkup',[MedicalCheckupController::class,'listDataTki']);
// Halaman Detail TKI - Medical Checkup
Route::get('medical-checkup/detail-tki/{id}', 'App\Http\Controllers\MedicalCheckupController@detailTki');
// Upload Sertifikat - Medical Checkup
Route::post('upload/store-medical/{id}','App\Http\Controllers\MedicalCheckupController@uploadSertifikatKesehatan');


// Halaman List Total TKI - MedicalCheckup
Route::get('list-total-tki-medical', 'App\Http\Controllers\MedicalCheckupController@listTki');
// Halaman Detail TKI - MedicalCheckup
Route::get('list-total-tki/medical/detail-tki/{id}', 'App\Http\Controllers\MedicalCheckupController@detailTki');
// Halaman List Total Medical - MedicalCheckup
Route::get('list-total-medical-medical', 'App\Http\Controllers\MedicalCheckupController@listMedical');
// Halaman Detail Medical - MedicalCheckup
Route::get('list-total-medical/medical/detail-medical/{id}', 'App\Http\Controllers\MedicalCheckupController@detailMedical');
// Halaman List Total BLK - MedicalCheckup
Route::get('list-total-blk-medical', 'App\Http\Controllers\MedicalCheckupController@listBlk');
// Halaman Detail BLK - MedicalCheckup
Route::get('list-total-medical/medical/detail-blk/{id}', 'App\Http\Controllers\MedicalCheckupController@detailBlk');
// Halaman List Total Berangkat - MedicalCheckup
Route::get('list-total-berangkat-medical', 'App\Http\Controllers\MedicalCheckupController@listBerangkat');
// Halaman Detail Berangkat - MedicalCheckup
Route::get('list-total-berangkat/medical/detail-blk/{id}', 'App\Http\Controllers\MedicalCheckupController@detailBerangkat');


// Login BLK
Route::get('login-blk', 'App\Http\Controllers\LoginBlkController@loginBlk');
route::post('post-login-blk',[LoginBlkController::class,'postlogin'])->name('post-login-blk');
Route::get('logout-blk', 'App\Http\Controllers\LoginBlkController@logout');
Route::group(['middleware' => ['auth','ceklevel:admin,admin-blk']], function () {
    route::get('blk',[BlkController::class,'dashboard'])->name('blk');
});
// List TKI - BLK
route::get('listtki-blk',[BlkController::class,'listDataTki']);
// Halaman Detail TKI - BLK
Route::get('blk/detail-tki/{id}', 'App\Http\Controllers\BlkController@detailTki');
// Upload Sertifikat - BLK
Route::post('upload/store-blk/{id}','App\Http\Controllers\BlkController@uploadSertifikatBlk');


// Login - P3MI
Route::get('login-p3mi', 'App\Http\Controllers\LoginP3miController@loginP3mi'); 
route::post('post-login-p3mi',[LoginP3miController::class,'postlogin'])->name('post-login-p3mi');
Route::get('logout-p3mi', 'App\Http\Controllers\LoginP3miController@logout');
//Halaman List TKI - P3MI
route::get('p3mi/{sponsor}',[P3miController::class,'dashboard']);


// Login - Pemberangkatan
Route::get('login-pemberangkatan', 'App\Http\Controllers\LoginPemberangkatanController@loginPemberangkatan'); 
route::post('post-login-pemberangkatan',[LoginPemberangkatanController::class,'postlogin'])->name('post-login-pemberangkatan');
Route::get('logout-pemberangkatan', 'App\Http\Controllers\LoginPemberangkatanController@logout');
//Halaman List TKI - Pemberangkatan
Route::group(['middleware' => ['auth','ceklevel:admin,admin-pemberangkatan']], function () {
    route::get('pemberangkatan',[PemberangkatanController::class,'dashboard']);
});
// Halaman Detail TKI - Pemberangkatan
Route::get('pemberangkatan/detail-tki/{id}', 'App\Http\Controllers\PemberangkatanController@detailTki');
// Upload paspor dan visa
Route::post('upload/store-pemberangkatan/{id}','App\Http\Controllers\PemberangkatanController@uploadPasporAndVisa');

Route::get('login', 'App\Http\Controllers\LoginController@login'); 