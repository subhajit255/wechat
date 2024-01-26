<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::get("/", "index")->name("index");
    Route::post("sign-up","signup")->name("sign-up");
    Route::get("sign-in", "signIn")->name("sign-in");
    Route::post("login","login")->name("login");
    Route::post("update-profile",'update')->name("update-profile");
});
Route::middleware(["auth"])->group(function () {
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::controller(MessageController::class)->group(function () {
        Route::get("home", "index")->name("home");
    });
    Route::controller(UserController::class)->group(function () {
        Route::get("my-contacts/{key}","contacts")->name("my-contacts");
    });
});
