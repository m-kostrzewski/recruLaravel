<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('home');
});

//Auth
Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'] );

//Posts
Route::prefix('post')->middleware('auth')->group(function() {
    Route::get('/', [PostController::class, 'index'] );
    Route::get('/{id}', [PostController::class, 'show'] )->name('post');
    Route::get('/{id}/edit', [PostController::class, 'edit'] )->name('editPost');
    Route::get('/create/new', [PostController::class, 'createView'] )->name('createPost');

    Route::post('/', [PostController::class, 'store'])->name('storePost');
    Route::put('/{id}', [PostController::class, 'update'])->name('updatePost');
    Route::delete('/{id}', [PostController::class, 'destroy'] )->name('deletePost');
});