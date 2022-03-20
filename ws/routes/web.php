<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\http\Controllers\PostController;

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

Route::get('/',[HomeController::class, 'index'])->name('index');

Route::get('/lol', [PostController::class, 'index']);



// Vid 4
Route::get('/accueil', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->whereNumber('id');
Route::get('/contact', [PostController::class, 'contact']);