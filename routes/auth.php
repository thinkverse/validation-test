<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function (Router $router) {
        $router->controller(AuthenticatedSessionController::class)
            ->group(function (Router $router) {
                $router->get('/login', 'create')->name('login');
                $router->post('/login', 'store');
            });

        $router->name('password.')
            ->group(function (Router $router) {
                $router->controller(PasswordResetLinkController::class)
                    ->group(function (Router $router) {
                        $router->get('/forgot-password', 'create')->name('request');
                        $router->post('/forgot-password', 'store')->name('email');
                    });

                $router->controller(NewPasswordController::class)
                    ->group(function (Router $router) {
                        $router->get('/reset-password/{token}', 'create')->name('reset');
                        $router->post('/reset-password', 'store')->name('update');
                    });
            });
    });

Route::middleware('auth')
    ->group(function (Router $router) {
        $router->get('verify-email', EmailVerificationPromptController::class)
            ->name('verification.notice');

        $router->get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        $router->post('email/verification-notification', EmailVerificationNotificationController::class)
            ->middleware('throttle:6,1')
            ->name('verification.send');

        $router->controller(ConfirmablePasswordController::class)
            ->name('password.')
            ->group(function (Router $router) {
                $router->get('/confirm-password', 'show')->name('confirm');
                $router->post('/confirm-password', 'store');
            });

        $router->post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
