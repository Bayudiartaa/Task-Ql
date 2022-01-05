<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'showLoginForm']);
// Auth::routes();


Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::resource('roles', RoleController::class)->except('show');

    Route::resource('users', UserController::class)->except('show');

    Route::resource('category', CategoryController::class)->except('show');

    Route::resource('post', PostController::class)->except('show');

    Route::resource('permission', PermissionController::class)->except('show');

    Route::resource('role', RoleController::class)->except('show');

    Route::resource('user', UserController::class)->except('show');

    Route::group(['prefix' => 'settings'], function(){
        //change user profile
        Route::get('change-profile/{id}', [ProfileController::class, 'profile'])->name('user-profile');
        Route::put('change-profile/{id}', [ProfileController::class, 'changeProfile'])->name('user-profile.update');
        //change password
        Route::get('change-password/{id}', [ProfileController::class, 'password'])->name('user-password');
        Route::put('change-password/{id}', [ProfileController::class, 'changePassword'])->name('user-password.update');
    });

});
Auth::routes(['register' => false]);
