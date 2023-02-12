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

Route::get('/admin', function () {
    return view('autentikasi.login');
});

Route::post('login', 'Autentikasi\LoginController@login')->name('login');
Route::get('logout', 'Autentikasi\LoginController@logout')->name('logout');
Route::get('dashboard', 'Admin\HomeController@index')->name('home')->middleware('CekLoginMiddleware');

//master pelapor
Route::get('datapelapor', 'Admin\PelaporController@index')->name('pelapor')->middleware('CekLoginMiddleware');
Route::get('add/pelapor', 'Admin\PelaporController@add')->name('addpelapor')->middleware('CekLoginMiddleware');
Route::post('tambah/pelapor', 'Admin\PelaporController@store')->name('tambahpelapor')->middleware('CekLoginMiddleware');
Route::delete('delete/pelapor/{id_user}', 'Admin\PelaporController@delete')->name('deletepelapor')->middleware('CekLoginMiddleware');
Route::get('edit/pelapor/{id_user}', 'Admin\PelaporController@edit')->name('editpelapor')->middleware('CekLoginMiddleware');
Route::patch('update/pelapor/{id_user}', 'Admin\PelaporController@update')->name('updatepelapor')->middleware('CekLoginMiddleware');

//master teknisi
Route::get('datateknisi', 'Admin\TeknisiController@index')->name('teknisi')->middleware('CekLoginMiddleware');
Route::get('add/teknisi', 'Admin\TeknisiController@add')->name('addteknisi')->middleware('CekLoginMiddleware');
Route::post('tambah/teknisi', 'Admin\TeknisiController@store')->name('tambahteknisi')->middleware('CekLoginMiddleware');
Route::delete('delete/teknisi/{id_user}', 'Admin\TeknisiController@delete')->name('deleteteknisi')->middleware('CekLoginMiddleware');
Route::get('edit/teknisi/{id_user}', 'Admin\TeknisiController@edit')->name('editteknisi')->middleware('CekLoginMiddleware');
Route::patch('update/teknisi/{id_user}', 'Admin\TeknisiController@update')->name('updateteknisi')->middleware('CekLoginMiddleware');

//master pimpinan
Route::get('datapimpinan', 'Admin\PimpinanController@index')->name('pimpinan')->middleware('CekLoginMiddleware');
Route::get('add/pimpinan', 'Admin\PimpinanController@add')->name('addpimpinan')->middleware('CekLoginMiddleware');
Route::delete('delete/pimpinan/{id_user}', 'Admin\PimpinanController@delete')->name('deletepimpinan')->middleware('CekLoginMiddleware');
Route::post('tambah/pimpinan', 'Admin\PimpinanController@store')->name('tambahpimpinan')->middleware('CekLoginMiddleware');
Route::get('edit/pimpinan/{id_user}', 'Admin\PimpinanController@edit')->name('editpimpinan')->middleware('CekLoginMiddleware');
Route::patch('update/pimpinan/{id_user}', 'Admin\PimpinanController@update')->name('updatepimpinan')->middleware('CekLoginMiddleware');

//Laporan
Route::get('datalaporan', 'Admin\LaporanController@index')->name('laporan')->middleware('CekLoginMiddleware');
Route::get('statuslaporan/{id_laporan}', 'Admin\LaporanController@detail')->name('statuslaporan')->middleware('CekLoginMiddleware');
Route::get('pilihteknisi/{id_laporan}', 'Admin\LaporanController@pilihteknisi')->name('pilihteknisi')->middleware('CekLoginMiddleware');
Route::patch('tambah-teknisi/{id_laporan}', 'Admin\LaporanController@tambahteknisi')->name('pilih.teknisi')->middleware('CekLoginMiddleware');
Route::get('biaya/{id_laporan}', 'Admin\LaporanController@biaya')->name('biaya')->middleware('CekLoginMiddleware');
Route::patch('addbiaya/{id_laporan}', 'Admin\LaporanController@addbiaya')->name('addbiaya')->middleware('CekLoginMiddleware');
Route::get('print/laporan', 'Admin\CetakLaporanController@pdf')->name('laporan.print')->middleware('CekLoginMiddleware');


//frontend
Route::get('/', function () {
    return view('user.terms');
});
Route::get('/loginuser', 'Autentikasi\LoginUserController@index')->name('loginuser');

Route::post('loginuser', 'Autentikasi\LoginUserController@login')->name('login_user');
Route::get('logoutuser', 'Autentikasi\LoginUserController@logout')->name('logout_user');

Route::get('home', 'User\HomeController@index')->name('homeuser')->middleware('LoginUserMiddleware');
Route::get('hometeknisi', 'User\HomeTeknisiController@index')->name('hometeknis')->middleware('LoginUserMiddleware');
Route::get('profile', 'User\ProfileController@index')->name('profile')->middleware('LoginUserMiddleware');



Route::get('history', 'User\HistoryController@index')->name('history')->middleware('LoginUserMiddleware');
Route::get('historyteknisi', 'User\HistoryController@indexteknisi')->name('historyteknisi')->middleware('LoginUserMiddleware');
Route::get('detailhistory/{id_laporan}', 'User\DetailHistoryController@index')->name('detailhistory')->middleware('LoginUserMiddleware');
Route::get('addprogress/{id_laporan}', 'User\PengaduanController@progress')->name('progress')->middleware('LoginUserMiddleware');
Route::post('tambahprogress/{id_laporan}', 'User\PengaduanController@addprogress')->name('tambahprogress')->middleware('LoginUserMiddleware');

//pengaduan
//sarana
// Route::get('pengaduan', 'User\PengaduanController@index')->name('pengaduan')->middleware('LoginUserMiddleware');
Route::get('pengaduan/{id}', 'User\PengaduanController@index')->name('pengaduan')->middleware('LoginUserMiddleware');
Route::post('addpengaduan', 'User\PengaduanController@store')->name('store.pengaduan')->middleware('LoginUserMiddleware');

//prasarana
Route::get('pengaduan_pra', 'User\PengaduanController@index_pra')->name('pengaduan.pra')->middleware('LoginUserMiddleware');
Route::post('addpengaduan_pra', 'User\PengaduanController@store_pra')->name('store.pra')->middleware('LoginUserMiddleware');

//khatibmas
Route::get('pengaduan_kha', 'User\PengaduanController@index_kha')->name('pengaduan.kha')->middleware('LoginUserMiddleware');
Route::post('addpengaduan_kha', 'User\PengaduanController@store_kha')->name('store.kha')->middleware('LoginUserMiddleware');

//notification
Route::post('/fcm-token', [NotifController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[NotifController::class,'notification'])->name('notification');
