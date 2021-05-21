<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function ()
{
    return view('welcome');
})->middleware( 'guest' );

Route::middleware( 'auth' )->group( function ()
{
    Route::get('/home', [HomeController::class, 'index']);

    Route::get('/user', [UserController::class, 'index'])->middleware('');
    Route::get('/user/{id}', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);

    Route::get('/post', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::put('/post/{id}', [PostController::class, 'update']);
    Route::get('/post/{id}', [PostController::class, 'edit']);
    Route::get('/post/delete/{id}', [PostController::class, 'delete']);

    Route::post('/userexit', [UserController::class, 'logout']);
});
