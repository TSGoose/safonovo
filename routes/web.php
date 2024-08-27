<?php

use App\Http\Controllers\ProductionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/products/', [ProductController::class, 'show'])->name('product.show');
Route::get('/about/', [AboutController::class, 'show'])->name('about.show');
Route::get('/production/', [ProductionController::class, 'show'])->name('production.show');
//Route::get('/products/{code}/{slug}', [ProductController::class, 'show'])->name('product.show');
//Route::get('/production/{slug}', [ProductionController::class, 'show'])->name('article.show');
