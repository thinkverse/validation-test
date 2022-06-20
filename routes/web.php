<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Routing\Router;
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

Route::middleware('auth')->group(function (Router $router) {
    $router->middleware('role:admin,user')->group(function (Router $router) {
        $router->view('/dashboard', 'dashboard')->name('dashboard');
        $router->view('/events', 'events')->name('events');

        $router->get('/u/{user:username}', UserProfileController::class)->name('users.profile');
    });

    $router->middleware('role:admin')->group(function (Router $router) {
        $router->resource('/users', UsersController::class)->only(['index', 'show', 'create', 'store']);
    });
});

require __DIR__ . '/auth.php';
