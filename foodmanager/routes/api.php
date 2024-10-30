<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerTagController;
use App\Http\Controllers\AjaxController;

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

Route::get('Tag/Delete/{id}', [ManagerTagController::class, 'tag_delete'])->name('tag.delete');

Route::post('ForgetPassword', [AjaxController::class, 'getForgetPassword'])->name('forget.password');
