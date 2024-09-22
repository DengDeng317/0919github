<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainCateController;
use App\Http\Controllers\SubCateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login']);
//Route::get('User', [UserController::class, 'index']);
Route::post('register', [UserController::class, 'register']);
Route::post('show', [UserController::class, 'show']);
Route::post('update', [UserController::class, 'update']);

//主分類
Route::post('mainadd', [MainCateController::class, 'create']);
Route::post('mainshow', [MainCateController::class, 'index']);
Route::post('mainupdate', [MainCateController::class, 'update']);
Route::post('main_sub', [MainCateController::class, 'index_sub']);

//次分類
// Route::post('subshow', [SubCateController::class, 'index']);
// Route::post('subadd', [SubCateController::class, 'create']);
// Route::post('subupdate', [SubCateController::class, 'update']);

//紀錄