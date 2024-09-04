<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\SekolahController;
use App\Http\Middleware\AdminPermission;
use App\Http\Middleware\OperatorPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    if(Auth::check()){

        if(Auth::user()->role_id==1){
            return redirect()->route('laporan.data.admin.pengajuan');
        }else{
            return redirect()->route('laporan.data.operator');
        }

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
                Route::middleware([AdminPermission::class])->group(function () {
                    Route::get('/create', 'create')->name('create');
                    Route::get('/data', 'data')->name('data');
                    Route::get('/data/dt', 'dataDt')->name('data.dt');
                    Route::get('/{operatorId}/reset-password', 'resetPassword')->name('resetPassword');
                });
            });
        });
    });

    Route::prefix('sekolah')->group(function () {
        Route::name('sekolah.')->group(function () {
            Route::controller(SekolahController::class)->group(function () {

                Route::middleware([AdminPermission::class])->group(function () {
                    Route::get('/data', 'data')->name('data');
                    Route::get('/data/dt', 'dataDt')->name('data.dt');
                });

                Route::middleware([OperatorPermission::class])->group(function () {
                    Route::get('/{sekolahId}/edit', 'edit')->name('edit');
                });

            });
        });
    });

    Route::prefix('laporan')->group(function () {
        Route::name('laporan.')->group(function () {
            Route::controller(LaporanController::class)->group(function () {

                Route::middleware([OperatorPermission::class])->group(function () {
                    Route::get('/create', 'create')->name('create');
                    Route::get('/data/operator', 'dataOperator')->name('data.operator');
                    Route::get('/data/operator/dt', 'dataOperatorDt')->name('data.operator.dt');
                    Route::get('/{laporanId}/edit', 'edit')->name('edit');
                });

                Route::middleware([AdminPermission::class])->group(function () {
                    Route::get('/data/admin/pengajuan', 'dataAdminPengajuan')->name('data.admin.pengajuan');
                    Route::get('/data/admin/pengajuan/dt', 'dataAdminPengajuanDt')->name('data.admin.pengajuan.dt');
                    Route::get('/data/admin/disetujui', 'dataAdminDisetujui')->name('data.admin.disetujui');
                    Route::get('/data/admin/disetujui/dt', 'dataAdminDisetujuiDt')->name('data.admin.disetujui.dt');
                });

                Route::get('/{laporanId}/detail', 'detail')->name('detail');
                Route::get('/{laporanId}/print', 'print')->name('print');


            });
        });
    });

});
