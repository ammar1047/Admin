<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditSuratController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and are assigned to the
| "web" middleware group. Make something great!
|
*/

// Root route (ubah sesuai kebutuhanmu)
Route::get('/', function () {
    return view('login'); // atau 'welcome'
});

// Auth routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Edit Surat routes
Route::get('/edit-surat', [EditSuratController::class, 'index'])->name('edit-surat.index');
Route::get('/edit-surat/{id}/edit', [EditSuratController::class, 'edit'])->name('edit-surat.edit');

// Surat CRUD (pastikan model & controller sudah ada)
Route::resource('surat', SuratController::class);

// Dashboard (hanya bisa diakses jika sudah login/session valid)
Route::middleware('SessionAuth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
});
// Route untuk mengakses halaman surat
Route::middleware('SessionAuth')->group(function () {
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
});