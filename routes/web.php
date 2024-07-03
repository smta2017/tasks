<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('users');

// Route::get('posts', [App\Http\Controllers\TaskController::class,'index'])->name('posts.index');
// Route::get('/posts/{id}', [App\Http\Controllers\TaskController::class,'show'])->name('posts.show');
// Route::post('posts', [App\Http\Controllers\TaskController::class,'store'])->name('posts.store');
// Route::get('/posts/create', [App\Http\Controllers\TaskController::class,'create'])->name('posts.create');
// Route::get('/posts/{id}/edit', [App\Http\Controllers\TaskController::class,'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [App\Http\Controllers\TaskController::class,'update'])->name('posts.update');
// Route::delete('/posts/{id}', [App\Http\Controllers\TaskController::class,'destroy'])->name('posts.delete');
Route::resource('tasks', App\Http\Controllers\TaskController::class);
Route::resource('users', App\Http\Controllers\UserController::class);