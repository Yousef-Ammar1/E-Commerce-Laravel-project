<?php

use App\Http\Controllers\Admin\Admin_panel_settingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin',
    'middleware' => 'auth:admin'],
    function () {
        Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])
        ->name('admin.logout');
        Route::get('/adminPanelSetting/index', [Admin_panel_settingController::class, 'index'])
        ->name('admin.adminPanelSetting.index');
        Route::get('/adminPanelSetting/edit', [Admin_panel_settingController::class, 'edit'])
        ->name('admin.adminPanelSetting.edit');
        Route::post('/adminPanelSetting/update', [Admin_panel_settingController::class, 'update'])
        ->name('admin.adminPanelSetting.update');

});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin',
    'middleware' => 'guest:admin'],
    function () {
    Route::get('login', [LoginController::class, 'show_login_view'])
    ->name('admin.showlogin');
    Route::post('login', [LoginController::class, 'login'])
    ->name('admin.login');
});
