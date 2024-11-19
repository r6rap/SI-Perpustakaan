<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PinjamController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::resource('bukus', BukuController::class)->middleware('auth');
Route::resource('kategoris', KategoriController::class)->middleware('auth');
Route::resource('pinjams', PinjamController::class)->middleware('auth');
Route::resource('pengembalians', PengembalianController::class)->middleware('auth');

Route::get('/pinjams/{pinjam}', [PinjamController::class, 'showDetail'])->name('pinjams.showDetail');