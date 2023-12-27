<?php

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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::get('/reset-password/{token}', function ($token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/anggota/action', 'AnggotaController@action')->name('anggota.action');
Route::get('/anggota/search', 'AnggotaController@search')->name('anggota.search');
Route::get('/buku/search', 'BukuController@search')->name('buku.search');
Route::get('/peminjaman/search', 'TransaksiController@search')->name('peminjaman.search');

Route::resource('/anggota','AnggotaController', ['middleware' => 'auth']);
Route::resource('/buku', 'BukuController', ['middleware' => 'auth']);
Route::resource('/kategori', 'kategoriController', ['middleware' => 'auth']);
Route::resource('/pinjam', 'TransaksiController', ['middleware' => 'auth']);
Route::resource('/penerbit', 'PenerbitController', ['middleware' => 'auth']);
Route::resource('/penulis', 'PengarangController', ['middleware' => 'auth']);
Route::resource('/denda', 'DendaController', ['middleware' => 'auth']);

// Route::get('/anggota/edit/{id}','PegawaiController@edit');
// Route::get('transaksi/show/{id}', 'TransaksiController@show');
Route::get('transaksi/showBuku/{id}', 'TransaksiController@showBuku');
Route::get('transaksi/getAnggota/{id}', 'TransaksiController@getAnggota');
Route::get('denda/getTransaksi/{id}', 'DendaController@getTransaksi');

Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');
Route::get('/import_excel', 'ImportAnggotaController@index');
Route::post('/import_excel/import', 'ImportAnggotaController@import');
Route::post('/transaksi/update/{id}', 'TransaksiController@ubahstatus');