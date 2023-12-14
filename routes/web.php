<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SportController;

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
Route::get('/sports', [HomeController::class,'liste'])->name('sports.index');

Route::get('/', [HomeController::class,'accueil'])->name('accueil');
Route::get('/liste', [HomeController::class,'liste'])->name('liste');
Route::get('/apropos', [HomeController::class,'apropos'])->name('apropos');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/create', [HomeController::class,'create'])->name('create');
Route::any('/store', [HomeController::class,'store'])->name('store');
Route::get('/edit/{id}', [HomeController::class,'edit'])->name('edit');
Route::put('/update/{id}', [HomeController::class,'update'])->name('update');
Route::get('/show/{id}', [HomeController::class,'show'])->name('show');
Route::get('/destroy', [HomeController::class,'destroy'])->name('destroy');
