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
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
    Route::get('auth', [AuthController::class, 'getAuth']);
    Route::post('auth', [AuthController::class, 'postAuth']);
    Route::post('login', [AuthController::class, 'postLogin']);
});

Route::middleware('auth')->group(function () {
    Route::get('chat', [UsersController::class, 'getChat'])->name('chat');
    # Route for logout 
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/auth');
    })->name('logout');
});
