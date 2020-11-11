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

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sort/{sort}', [HomeController::class, 'sort'])->name('sort');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/like/{review}', [HomeController::class, 'like'])->name('like');
Route::get('/show/{review}', [HomeController::class, 'show'])->name('one');
Route::get('/next/{review}', [HomeController::class, 'next'])->name('next');
Route::get('/previous/{review}', [HomeController::class, 'previous'])->name('previous');

