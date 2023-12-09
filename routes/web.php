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


Route::resource('sport', 'HomeController');

Route::get('/sports', [HomeController::class,'liste'])->name('sports.index');

Route::any('/', [HomeController::class,'accueil'])->name('accueil');
Route::any('/liste', [HomeController::class,'liste'])->name('liste');
Route::any('/apropos', [HomeController::class,'apropos'])->name('apropos');
Route::any('/contact', [HomeController::class,'contact'])->name('contact');
Route::any('/create', [HomeController::class,'create'])->name('create');
Route::any('/store', [HomeController::class,'store'])->name('store');
Route::get('/edit', [HomeController::class,'edit'])->name('edit');
Route::any('/update', [HomeController::class,'update'])->name('update');
Route::any('/show', [HomeController::class,'show'])->name('show');
