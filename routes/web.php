<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
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
Route::get('/', fn() => redirect()->route('login'));

// About (public)


// Routes wajib login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Arsip
    Route::get('arsip', [ArsipController::class,'index'])->name('arsip.index');
    Route::get('arsip/create', [ArsipController::class,'create'])->name('arsip.create');
    Route::post('arsip', [ArsipController::class,'store'])->name('arsip.store');
    Route::get('arsip/{arsip}', [ArsipController::class,'show'])->name('arsip.show');
    Route::get('arsip/{arsip}/edit', [ArsipController::class,'edit'])->name('arsip.edit');
    Route::put('arsip/{arsip}', [ArsipController::class,'update'])->name('arsip.update');
    Route::delete('arsip/{arsip}', [ArsipController::class,'destroy'])->name('arsip.destroy');
    Route::get('arsip/{arsip}/unduh', [ArsipController::class,'unduh'])->name('arsip.unduh');

    // Kategori
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);


    Route::get('/about', [AboutController::class, 'index'])->name('about');
});


require __DIR__.'/auth.php';
