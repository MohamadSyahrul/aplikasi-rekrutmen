<?php

use App\Http\Middleware\Admin;
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
});

    // Route::middleware([Pelamar::class])->group(function () { *aktifkan jika auth sudah selesai


    // });
