<?php

use App\Http\Controllers\KasirController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kasir', [App\Http\Controllers\KasirController::class, 'index'])->name('kasir');

Route::post('/kasir', [App\Http\Controllers\KasirController::class, 'create'])->name('tambah.kasir');

Route::get('/kasir/{id}/edit', [App\Http\Controllers\KasirController::class, 'edit']);

Route::post('/kasir/{id}/update', [App\Http\Controllers\KasirController::class, 'update'])->name('ubah.kasir');