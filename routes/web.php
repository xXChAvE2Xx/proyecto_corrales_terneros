<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/breeding', [App\Http\Controllers\BreedingController::class, 'index'])->name('breeding.index')->middleware('auth');
Route::post('/breeding', [App\Http\Controllers\BreedingController::class, 'store'])->name('breeding.store');

Route::get('/breeding/{id}', [App\Http\Controllers\QuarantineController::class, 'index'])->name('quarantine.index')->middleware('auth');
Route::patch('/breeding/{id}', [App\Http\Controllers\QuarantineController::class, 'update'])->name('quarantine.update')->middleware('auth');

Route::get('/edit/{id}', [App\Http\Controllers\BreedingController::class, 'edit'])->name('breeding.edit')->middleware('auth');
Route::patch('/edit/{id}', [App\Http\Controllers\BreedingController::class, 'update'])->name('breeding.update');

Route::get('/show/{id}', [App\Http\Controllers\BreedingController::class, 'show'])->name('breeding.show')->middleware('auth');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');


Route::get('/register/health/{id}', [App\Http\Controllers\HealthController::class, 'index'])->name('health.register')->middleware('auth');
Route::post('/register/health/{id}', [App\Http\Controllers\HealthController::class, 'store'])->name('health.store');

Route::get('/edit/health/{id}', [App\Http\Controllers\HealthController::class, 'edit'])->name('health.edit');
Route::patch('/edit/health/{id}', [App\Http\Controllers\HealthController::class, 'update'])->name('health.update');


