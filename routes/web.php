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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/sports', [SportController::class,'index'])->name('sports.index');

Route::any('/accueil', [HomeController::class,'accueil']);
Route::view('/vue', 'accueil');
