<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('/registration', [MainController::class, 'registration'])->name('registration');
Route::get('/registration-ok', [MainController::class, 'registrationOk'])->name('registration-ok');

Route::get('/authentication', [MainController::class, 'authentication'])->name('authentication');