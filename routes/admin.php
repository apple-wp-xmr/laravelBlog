<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImagePostController;
use App\Http\Controllers\Admin\PostContoller;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
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


Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::group([ 'prefix' => 'category', 'as' => 'category.'], function(){
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->name('show');
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
    Route::patch('/patch/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});

Route::resource('tag', TagController::class);
Route::resource('post', PostContoller::class);
Route::resource('user', UserController::class);

Route::post('/post/images', [ImagePostController::class, 'store'])->name('post.image');

