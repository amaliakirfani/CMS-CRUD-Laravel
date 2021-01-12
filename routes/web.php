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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/show_karyawan', 'KaryawanController@show_karyawan');
    Route::get('/karyawan/tambah', 'KaryawanController@create_karyawan');
    Route::post('/karyawan/tambah', 'KaryawanController@create_karyawan');
    Route::get('/karyawan/hapus/{id}', 'KaryawanController@delete_karyawan');
    Route::get('/karyawan/edit/{id}', 'KaryawanController@edit_karyawan');
    Route::post('/karyawan/update', 'KaryawanController@update_karyawan');

    Route::get('/show_keluarga', 'KeluargaController@show_keluarga');
    Route::get('/keluarga/tambah', 'KeluargaController@create_keluarga');
    Route::post('/keluarga/tambah', 'KeluargaController@create_keluarga');
    Route::get('/keluarga/hapus/{id}', 'KeluargaController@delete_keluarga');
    Route::get('/keluarga/edit/{id}', 'KeluargaController@edit_keluarga');
    Route::post('/keluarga/update', 'KeluargaController@update_keluarga');
});

Route::get('/login', 'LoginController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
