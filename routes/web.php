<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->middleware('guest');

Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/events', 'events')->name('events');

    Route::get('/u/{user:username}', UserProfileController::class)->name('users.profile');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UsersController::class)->only(['index', 'show', 'create', 'store']);
});

require __DIR__.'/auth.php';
