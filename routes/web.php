<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AboutController;


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

// Beranda menampilkan daftar arsip

Route::get('/', [ArsipController::class, 'index']);

Route::resource('arsip', ArsipController::class);
Route::get('arsip/{arsip}/unduh', [ArsipController::class, 'unduh'])->name('arsip.unduh');

// Resource untuk arsip (kecuali index karena sudah di root)
Route::get('arsip/create', [ArsipController::class,'create'])->name('arsip.create');
Route::post('arsip', [ArsipController::class,'store'])->name('arsip.store');
Route::get('arsip/{arsip}', [ArsipController::class,'show'])->name('arsip.show');
Route::get('arsip/{arsip}/edit', [ArsipController::class,'edit'])->name('arsip.edit');
Route::put('arsip/{arsip}', [ArsipController::class,'update'])->name('arsip.update');
Route::delete('arsip/{arsip}', [ArsipController::class,'destroy'])->name('arsip.destroy');
Route::get('arsip/{arsip}/unduh', [ArsipController::class,'unduh'])->name('arsip.unduh');

// CRUD kategori
Route::resource('kategori', KategoriController::class)->except(['show']);

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Route::get('/', function () {
//     return view('welcome');
// });
