<?php

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
    return view('login');
});

Route::get('/login','AuthController@index')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::group(['middleware'=>['auth','checkRole:admin']],function(){
    //pasien
    Route::resource('pasien','pasienController');
    Route::get('/pasienapi','pasienController@api');
    //datamaster
    // dokter
    Route::Resource('/dokter','dokterController');
    Route::get('/dokterapi','dokterController@api');
    // obat
    Route::Resource('/obat','obatController');
    Route::get('/obatapi','obatController@api');
    //biaya
    Route::Resource('/biaya','biayaController');
    Route::get('/biayaapi','biayaController@api');
 
    //akun
    Route::resource('/akun','userController');
    Route::get('/akunapi','userController@api');
    Route::post('/akunpass/{id}','userController@pass');
    Route::get('/akunapi','userController@api');
    //laporan
    Route::get('/laporan','laporanController@index');
    Route::get('/laporan/{id}','laporanController@cetak');
    Route::get('/dashboard', function () {
        return view('halamanawal.dashboard');});
   
});
Route::group(['middleware'=>['auth','checkRole:resepsionis']],function(){
        //daftar pasien
        Route::get('/pasien-non-bpjs','pasiensController@nonbpjs');
        Route::get('/pasien-bpjs','pasiensController@bpjs');
        Route::post('/tambahpasien','pasiensController@store');
         //cetakkartu
        Route::get('/cetak','kartuController@index');
        Route::get('/cetak/{pasien}','kartuController@cetak');
        //berobat
        Route::post('/berobat/{pasien}','berobatController@berobat');
        Route::get('/kasir','berobatController@kasir');
        Route::post('/selesaiberobat/{pasien}','berobatController@selesai');
        //cetak
        Route::get('/invoice/{pasien}','kartuController@invoice');
        Route::get('/kasirapi/{pasien}','kartuController@api');
});

Route::group(['middleware'=>['auth','checkRole:apotek']],function(){

    Route::get('/berobat','berobatController@ambilobat');
    Route::post('/detailobat/{pasien}','berobatController@detailobat');
});
Route::group(['middleware'=>['auth','checkRole:kasir']],function(){
       
});

