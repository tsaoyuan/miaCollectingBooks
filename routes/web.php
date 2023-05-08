<?php

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

Route::get('/', function () {
    $page_description = 'This is my render message.';
    return view('welcome', ['page_description' => $page_description]);
});

Route::get('login', [\App\Http\Controllers\SessionsController::class, 'create'])->name('login');
Route::post('login', [\App\Http\Controllers\SessionsController::class, 'store']);
Route::get('register', [\App\Http\Controllers\WebRegisterController::class, 'create']);
Route::post('register', [\App\Http\Controllers\WebRegisterController::class, 'store']);
Route::post('logout', [\App\Http\Controllers\SessionsController::class, 'destroy']);

//OAuth 第三方登入
Route::prefix('auth')->group(function () {
    Route::get('/{provider}/', [\App\Http\Controllers\ThirdPartyAuthController::class, 'redirectToProvider']);
    Route::get('/{provider}/callback', [\App\Http\Controllers\ThirdPartyAuthController::class, 'handleProviderCallback']);
});

Route::prefix('password')->group( function () {
    Route::get('/forgot', [\App\Http\Controllers\PasswordForgotController::class, 'create']);
    Route::post('/forgot', [\App\Http\Controllers\PasswordForgotController::class, 'store']);
    Route::get('/reset/{token}', [\App\Http\Controllers\PasswordResetController::class, 'create'])->name('password.reset');
    Route::post('/reset', [\App\Http\Controllers\PasswordResetController::class, 'store']);
})->middleware('guest');
