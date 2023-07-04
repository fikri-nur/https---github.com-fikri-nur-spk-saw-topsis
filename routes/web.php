<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth',], function() {
    Route::resource('alternatif', AlternativeController::class);
    Route::resource('kriteria', CriteriaController::class);
    Route::resource('matriks', MatrixController::class);
    Route::resource('tabel', TableController::class);

    Route::get('process/konversi', [ProcessController::class, 'processNilaiKeputusan'])->name('konversi');
    Route::get('process/perhitugan', [ProcessController::class, 'process'])->name('process');
    
});