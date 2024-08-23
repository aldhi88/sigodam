<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    if(Auth::check()){
         return redirect()->route('dashboard.index');
    }
    return redirect()->route('auth.login');
})->name('anchor');

Route::prefix('auth')->group(function () {
    Route::name('auth.')->group(function () {
        Route::controller(AuthController::class)->group(function () {

            Route::middleware('guest')->group(function(){

                Route::get('/login', 'login')->name('login');
                Route::get('/register', 'register')->name('register');

            });

            Route::middleware('auth:web')->group(function(){

                Route::get('/logout', 'logout')->name('logout');

            });

        });
    });
});
