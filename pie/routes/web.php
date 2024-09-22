<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MemberController;

use App\Livewire\CounterComponent;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('/counter', CounterComponent::class);


// Route::get('Test', [TestController::class, 'indexAction']);

// Route::get('/members', [MemberController::class, 'getAllMembers']);