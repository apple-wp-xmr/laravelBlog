<?php

use App\Exporter\UserStatsCsvExpoerter;
use App\Exporter\UserStatsExporterContract;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Educ\ExportController;
// use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Auth::routes(['verify' => true]);



// container tutorial
Route::get('/container', [ExportController::class, 'handle']);

