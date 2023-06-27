<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganizationController;
use App\Http\Controllers\Organization\DashboardController as OrganizationDashboardController;
use App\Http\Controllers\Organization\OrganizationController;
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
//Admin Routes

Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['EnsureAdmin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile');
    Route::get('/organizations', [AdminOrganizationController::class, 'showOrganizations'])->name('organizations');
    Route::post('/organization/update', [AdminOrganizationController::class, 'updateOrganization'])->name('organization.update');
    Route::get('/organization/delete/{id}', [AdminOrganizationController::class, 'deleteOrganization'])->name('organization.delete');
    Route::get('/users', [UserController::class, 'showUsers'])->name('users');
    Route::post('/user/update', [UserController::class, 'updateUser'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');


});

//Organization Routes
Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.login');
Route::post('/organization', [OrganizationController::class, 'login'])->name('organization.login');
Route::get('/organization/register', [OrganizationController::class, 'register'])->name('organization.register');
Route::post('/organization/register', [OrganizationController::class, 'registerOrganization'])->name('organization.register');

Route::group(['namespace' => 'Organization', 'as' => 'organization.', 'prefix' => 'organization', 'middleware' => ['EnsureOrganization']], function () {
    Route::get('/dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [OrganizationController::class, 'logout'])->name('logout');
    Route::get('/profile', [OrganizationController::class, 'profile'])->name('profile');
    Route::post('/profile', [OrganizationController::class, 'updateProfile'])->name('profile');

});
