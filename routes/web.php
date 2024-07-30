<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(RuangController::class)->group(function () {
    Route::get('ruang',  'ruang')->name('ruang');
    Route::post('ruang',  'ruangStore')->name('ruang.store');
    Route::get('ruang/{ruang}/edit',  'ruangEdit')->name('ruang.edit');
    Route::put('ruang/{ruang}',  'ruangUpdate')->name('ruang.update');
    Route::delete('ruang/{ruang}',  'ruangDestroy')->name('ruang.destroy');
});
