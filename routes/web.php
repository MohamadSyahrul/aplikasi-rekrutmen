<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard',function () {
    return view('pages.dashboard');
});

    // Route::middleware([Admin::class])->group(function () { *aktifkan jika auth sudah selesai
        Route::get('/dataLowonganKerja',function () {
            return view('pages.admin.data-loker.index');
        });
        Route::get('/dataPelamar',function () {
            return view('pages.admin.data-pelamar.index');
        });
    // });

    // Route::middleware([Pelamar::class])->group(function () { *aktifkan jika auth sudah selesai


    // });
