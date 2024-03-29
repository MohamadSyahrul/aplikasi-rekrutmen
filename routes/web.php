<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Pelamar;
use App\Lamaran;
use App\Loker;
use App\User;
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
Route::get('verifikasi-email', function () {
    return view('pages.verifikasi');
});

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // hanya user yang verified yang bisa mengakses route ini
})->middleware('verified');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('icon', function () {
    return view('pages.icon');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = User::count();
        $kategori = DB::table("lamarans")->select(DB::raw('loker_id, nama, count(pelamar_id) jml_pelamar'), 'status')
                            ->leftJoin("lokers", "lamarans.loker_id", "=", "lokers.id")
                            ->groupBy('loker_id', 'nama')
                            ->get();
                            // dd($kategori);
        $lamaran = Lamaran::count();
        $lowongan = Loker::count();
        // $data = Loker::select('status')->get();
        // dd($data);
        return view('pages.dashboard',
        [
            'user' => $user,
            'lamaran' => $lamaran,
            'lowongan' => $lowongan,
            'kategori' => $kategori,
            // 'data' => $data
        ]
        );
    });
});

// *aktifkan jika auth sudah selesai
Route::middleware([Admin::class, 'auth'])->group(function () {
    Route::resource('dataPelamar', 'Admin\PelamarController');
    Route::resource('lowonganKerja', 'Admin\LokerController');
    // Route::get('/changeStatus', 'Admin\LokerController@detail')->name('changeStatus');

    Route::resource('lamaran', 'Admin\LamaranController');
    Route::get('lamaran/download/{id}', 'Admin\LamaranController@download')->name('lamaran.download');

    Route::get('/ubah_status/{id}', 'Admin\LokerController@ubah_status');
    Route::get('/ubah_aktif/{id}', 'Admin\LokerController@ubahStatus');


    Route::resource('pengumuman', 'Admin\PengumumanController');

    Route::resource('dataKuis', 'Admin\KuisController');
    Route::resource('dataSoal', 'Admin\SoalController');
    Route::resource('dataPenilaian', 'Admin\JawabanController');

    Route::post('dataTambah', 'Admin\SoalController@tambah')->name('dataSoal.tambah');
    Route::post('dataTambahKuis', 'Admin\KuisController@tambah')->name('dataTambahKuis.tambah');

    Route::get('NilaiWawancara/{id}', 'Admin\JawabanController@wawancara')->name('NilaiWawancara');
    Route::post('NilaiWawancaraStore', 'Admin\JawabanController@wawancaraStore')->name('NilaiWawancaraStore');
    Route::patch('NilaiWawancara/{id}', 'Admin\JawabanController@wawancaraUpdate')->name('NilaiWawancaraUpdate');
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
