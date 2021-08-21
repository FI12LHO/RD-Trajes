<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\userController;

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
    return view('index');
});

Route::get('/test', function () {
    return view('welcome');
});

Route::post('/test/request', function () {
    return json_encode(['msg' => 'Hello World!!']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [userController::class, 'show']);

    Route::get('/register', [userController::class, 'show']);

    Route::post('/login', [userController::class, 'show']);

    Route::post('/register', [userController::class, 'show']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [productController::class, 'index']);
    Route::get('/show/{id}', [productController::class, 'show']);
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', [cartController::class, 'index']);
    Route::get('/create', [cartController::class, 'create']);
    Route::get('/edit', [cartController::class, 'edit']);
    Route::delete('/delete', [cartController::class, 'delete']);
});