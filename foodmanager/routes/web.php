<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FoodStockManagerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ManagerTagController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\EventManageController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\NotificationController;


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

Route::get('SendMail', [SendMailController::class, 'send']);
Route::get('Login', [AuthController::class, 'login'])->name('login');
Route::post('Login', [AuthController::class, 'loginStore']);

Route::get('Register', [AuthController::class, 'register'])->name('register');
Route::post('Register', [AuthController::class, 'registerStore']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('Logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('PasswordReset', [AuthController::class, 'password_reset'])->name('password.reset');
    Route::post('PasswordReset', [AuthController::class, 'password_reset_store'])->name('password.reset.store');

    Route::get('getFoodDetails/{id}', [AjaxController::class, 'getFoodDetails'])->name('getFoodDetails');

    Route::post('Calendar', [CalendarController::class, 'store'])->name('calendar');
    Route::post('CalendarUpdate', [CalendarController::class, 'update'])->name('calendar.update');

    Route::get('FoodStockManager', [FoodStockManagerController::class, 'index'])->name('food_stock_manager');
    Route::post('FoodStockManager', [FoodStockManagerController::class, 'store']);

    Route::get('Tag', [ManagerTagController::class, 'index'])->name('tag');
    Route::post('Tag', [ManagerTagController::class, 'store']);

    Route::post('addTag', [ManagerTagController::class, 'add_store'])->name('tag.add');
    Route::post('updateTag', [ManagerTagController::class, 'update_store'])->name('tag.update');

    Route::get('EventManage', [EventManageController::class, 'index'])->name('event.manage');

    Route::get('Personal', [PersonalController::class, 'index'])->name('personal');
    Route::post('Personal', [PersonalController::class, 'store']);

    Route::get('Notification', [NotificationController::class, 'index'])->name('notification');
    Route::post('Notification', [NotificationController::class, 'store']);
});
