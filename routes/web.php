<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Arsip
    Route::resource('arsip', ArsipController::class);
    Route::get('arsip/{arsip}/unduh', [ArsipController::class, 'unduh'])->name('arsip.unduh');

    // Kategori
    Route::resource('kategori', KategoriController::class)->except(['show']);

    // About
    Route::get('/about', [AboutController::class, 'index'])->name('about');
});

require __DIR__.'/auth.php';
