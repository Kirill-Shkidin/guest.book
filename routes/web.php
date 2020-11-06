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
use App\Http\Controllers\ApiController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sort/{sort}', [HomeController::class, 'sort'])->name('sort');
Route::get('/create', [HomeController::class, 'create'])->name('create');
Route::post('/store', [HomeController::class, 'store'])->name('store');

Route::get('/ads', [ApiController::class, 'index'])->name('show.all');
Route::get('/ads/{ad}', [ApiController::class, 'show'])->name('ad.one');


