<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ViewRolesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::view('/events', 'events')->name('events');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UsersController::class)->only(['index', 'show', 'create', 'store']);

    Route::get('/roles', ViewRolesController::class)->name('roles');
});

require __DIR__.'/auth.php';
