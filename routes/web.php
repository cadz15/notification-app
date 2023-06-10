<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'post'], function() {
        Route::get('/', [PostController::class, 'index'])->name('post.home');
        Route::get('/create', [PostController::class, 'createIndex'])->middleware(['can:create post']);
        Route::post('/create', [PostController::class, 'store']);
    });


    Route::group(['prefix' => 'permission'], function() {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.home');
        Route::get('/create', [PermissionController::class, 'createIndex']);
        Route::post('/create', [PermissionController::class, 'store']);
    });
});