<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
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
                Route::get('/account-setting', 'accountSetting')->name('accountSetting');
            });

        });
    });
});

Route::middleware('auth:web')->group(function(){

    Route::prefix('dashboard')->group(function () {
        Route::name('dashboard.')->group(function () {
            Route::controller(DashboardController::class)->group(function () {

                Route::get('/index', 'index')->name('index');
                Route::get('/index/dt', 'dt')->name('index.dt');

            });
        });
    });

    Route::prefix('operator')->group(function () {
        Route::name('operator.')->group(function () {
            Route::controller(OperatorController::class)->group(function () {

                Route::get('/create', 'create')->name('create');
                Route::get('/data', 'data')->name('data');
                Route::get('/data/dt', 'dataDt')->name('data.dt');
                Route::get('/{operatorId}/reset-password', 'resetPassword')->name('resetPassword');
                // Route::get('/index/dt', 'dt')->name('index.dt');

            });
        });
    });

});
