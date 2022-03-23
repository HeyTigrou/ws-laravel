<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CountryController;

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

Route::get('/',[PostController::class, 'index'])->name('index');
Route::get('/lol', [PostController::class, 'index'])->name('MainMenu');


// Vid 4
Route::get('/accueil', [PostController::class, 'index']);

// Vid 8 
Route::get('/posts/create', [PostController::class, 'createPost'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'storePost'])->name('posts.store');
Route::get('/posts/update/{id}', [PostController::class, 'updatePost'])->name('posts.update');
Route::post('/posts/update/{id}', [PostController::class, 'validateUpdatePost'])->name('posts.validateUpdate');
Route::post('/posts/destroy/{id}', [PostController::class, 'destroyPost'])->name('posts.destroy');
// Vid 8 

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/contact', [PostController::class, 'contact']);
Route::get('/article/{id}',[PostController::class, 'show']);

// POC :
Route::resource('countries', CountryController::class);