<?php

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
    return view('login');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

use App\Http\Controllers\EditSuratController;

Route::get('/edit-surat', [EditSuratController::class, 'index'])->name('edit-surat.index');
Route::get('/edit-surat/{id}/edit', [EditSuratController::class, 'edit'])->name('edit-surat.edit');


Route::middleware('SessionAuth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

