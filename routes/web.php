<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

// ===== Import Admin controller
use App\Http\Controllers\Admin\Auth\{RegisterController};
use App\Http\Controllers\Admin\Auth\{LoginController};
use App\Http\Controllers\Admin\{HomeController};

// ===== Import Frontend controller
use App\Http\Controllers\Frontend\{FrontendHomeController};

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
    return view('admin.auth.login');
});

Auth::routes();

// ======================= User Register
Route::get('/admin/register', [RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [RegisterController::class, 'store'])->name('admin.register.store');

// ======================= User Login/Logout
Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// ======================= Admin Dashboard
Route::group(['middleware' => ['auth:web']], function () {

    // admin dashboard route here...
    Route::get('/admin/dashboard', [HomeController::class, 'Admin_Home'])->name('admin.dashboard');

});

// ======================= Frontend Jobboard Start Here...!!
Route::get('/frontend/home', [FrontendHomeController::class, 'frontend_home'])->name('frontend.home');

// ================================== if website is not proper working then run this route path ============================================

// ========= Clear Route Cache from Browser
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// ========= Clear Config Cache from Browser
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// ========= Clear Application Cache from Browser
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// ========= Clear View Cache from Browser
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
