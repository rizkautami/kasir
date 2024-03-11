<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController; 

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

//login
Route::get('/', [AuthController::class, 'index']);
// Route::post('/cek_login', [AuthController::class, 'cek_login']);
// Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    //crud data user
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy', [UserController::class, 'destroy']);
});

Route::group(['middleware' => ['auth','checkRole:admin,kasir']], function(){
    //crud data user
    Route::get('/user', [HomeController::class, 'index']);
    Route::post('/user/store', [HomeController::class, 'store']);
    Route::get('/user', [HomeController::class, 'index']);
});