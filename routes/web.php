<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
if (\Request::segment(1) == 'admin')
{
    //Admin Dashboard Routes
    Route::prefix('admin')->group(function () {
        Route::get('/login', [AuthController::class, 'login_page'])->name('admin.view.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
            Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

            //Blogs
            Route::resource('blogs', '\App\Http\Controllers\Admin\BlogController');
            //Products
            Route::resource('products', '\App\Http\Controllers\Admin\ProductController');

        });
    });


}
else
{
    //Vue Js
    Route::get('{any?}', function ($any = null) {

        return view('welcome');

    })->where('any', '.*');


}


