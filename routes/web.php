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
    Route::get('/login', [userController::class, 'login']);

    Route::get('/register', [userController::class, 'register']);

    Route::post('/login', [userController::class, 'signIn']);

    Route::post('/register', [userController::class, 'signUp']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [productController::class, 'index']);
    Route::get('/show/{id}', [productController::class, 'show']);
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/{id}', [cartController::class, 'index']);
    Route::get('/show/{id}', [cartController::class, 'show']);
    Route::post('/create', [cartController::class, 'store']);
    Route::delete('/delete', [cartController::class, 'destroy']);
});
