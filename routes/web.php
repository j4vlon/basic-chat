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
# For unauthorized users only
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('registration', [AuthController::class, 'getRegistartion']);
    Route::post('registartion', [AuthController::class, 'postRegister'])->name('register');

    Route::get('login', [AuthController::class, 'getLogin']);
    Route::post('login', [AuthController::class, 'postLogin'])->name('login');
});
