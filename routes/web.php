<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


// Route::group(
//     [
//         'namespace' => 'Admin',
//         'prefix' => 'admin',
//         'middleware' => 'guest:admin'
//     ],
//     function () {
//         Route::get('login', [LoginController::class, 'show_login_view'])
//             ->name('admin.showlogin');
//         Route::post('login', [LoginController::class, 'login'])
//             ->name('admin.login');
//         // Route::get('lol', [LoginController::class, 'login'])
//         //     ->name('admin.login');
//     }
// );

// Route::group(
//     [
//         'namespace' => 'Admin',
//         'prefix' => 'admin',
//         'middleware' => 'auth:admin'
//     ],
//     function () {
//         Route::get('/', [DashboardController::class, 'index'])
//             ->name('admin.dashboard');
//         Route::get('logout', [LoginController::class, 'logout'])
//             ->name('admin.logout');
//     }
// );

