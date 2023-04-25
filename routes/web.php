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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'post'], function() {
        Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('post.home');
        Route::get('/create', [App\Http\Controllers\PostController::class, 'createIndex']);
        Route::post('/create', [App\Http\Controllers\PostController::class, 'store']);
    });


    Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.home');
});