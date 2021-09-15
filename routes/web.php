<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Pelamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeUnit\FunctionUnit;

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('icon', function () {
    return view('pages.icon');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
});

// *aktifkan jika auth sudah selesai
Route::middleware([Admin::class, 'auth'])->group(function () {
    Route::resource('dataPelamar', 'Admin\PelamarController');
    Route::resource('lowonganKerja', 'Admin\LokerController');
    Route::resource('lamaran', 'Admin\LamaranController');
    Route::get('lamaran/download/{id}', 'Admin\LamaranController@download')->name('lamaran.download');

    Route::resource('pengumuman', 'Admin\PengumumanController');

    Route::resource('dataKuis', 'Admin\KuisController');
    Route::resource('dataSoal', 'Admin\SoalController');
    Route::resource('dataPenilaian', 'Admin\JawabanController');

});

Route::prefix('pelamar')->middleware([Pelamar::class, 'auth'])->group(function () {
    Route::get('dataPelamar', 'Pelamar\PelamarController@show')->name('pelamarDataPelamar.show');
    Route::get('dataPelamar/download/{id}', 'Pelamar\PelamarController@download')->name('pelamarDataPelamar.download');
    Route::get('dataPelamar/{id}', 'Pelamar\PelamarController@edit')->name('pelamarDataPelamar.edit');
    Route::patch('dataPelamar/{id}', 'Pelamar\PelamarController@update')->name('pelamarDataPelamar.update');

    Route::resource('pekerjaan', 'Pelamar\PekerjaanController');

    Route::get('lowonganKerja', 'Pelamar\LokerController@index')->name('pelamarLowonganKerja.index');

    Route::get('lowonganKerja/{id}', 'Pelamar\LokerController@show')->name('pelamarLowonganKerja.show');

    Route::get('lowonganKerja/lamar/{id}', 'Pelamar\LokerController@lamar')->name('pelamarLowonganKerja.lamar');

    Route::delete('lowonganKerja/lamar/{id}', 'Pelamar\LokerController@hapusLamaran')->name('pelamarLowonganKerja.hapusLamaran');

    Route::get('kuis', 'Pelamar\KuisController@index')->name('pelamarKuis.index');
    Route::get('kuis/{id}', 'Pelamar\KuisController@show')->name('pelamarKuis.show');

    Route::get('soal/{id}', 'Pelamar\SoalController@show')->name('pelamarSoal.show');
    Route::post('soal', 'Pelamar\SoalController@store')->name('pelamarSoal.store');

    Route::post('jawaban', 'Pelamar\JawabanController@store')->name('pelamar.jawabanStore');

    Route::get('pengumuman', 'Pelamar\PengumumanController@index')->name('pelamarPengumuman.index');
    Route::get('pengumuman/{id}', 'Pelamar\PengumumanController@show')->name('pelamarPengumuman.show');
    Route::get('pengumuman/download/{id}', 'Pelamar\PengumumanController@download')->name('pelamarPengumuman.download');

    Route::get('lowonganKerjaEmail', 'Pelamar\MailController@index');
});
