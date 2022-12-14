<?php

use App\Http\Controllers\AdminController;
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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;


# For unauthorized users only

Route::middleware('guest')->group(
    function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('signup', 'getSignUp');
            Route::post('signup', 'postSignUp')->name('auth');
            Route::get('signin', 'getSignIn');
            Route::post('signin', 'postSignIn')->name('signin');
        });
    }
);
# For authorized users only

Route::middleware('auth')->group(function () {
    Route::controller(ChatController::class)->group(function () {
        Route::get('chat', 'getChat')->name('chat');
        Route::get('/messages', 'messages');
        Route::post('/send', 'send');
    });

    # For users with admin role

    Route::middleware('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('admin', 'getAdminPage');
        });
    });

    # Route for users 
    Route::controller(UsersController::class)->group(function () {
        Route::get('user', 'getUser');
        Route::get('edit/{id}', 'userUpdate');
    });

    # Route for logout 
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/signin');
    })->name('logout');
});
