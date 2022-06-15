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

Route::get('/edit/{id}', [App\Http\Controllers\BreedingController::class, 'show'])->name('breeding.edit');
Route::patch('/edit/{id}', [App\Http\Controllers\BreedingController::class, 'update'])->name('breeding.update');


Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');

