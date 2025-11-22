<?php

namespace App\Providers;

use App\Http\Controllers\Auth\AuthController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::macro('authGuard', function (string $prefix, string $name, string $guard, string $dashboardController, bool $register = true) {
            Route::prefix($prefix)->controller(AuthController::class)->name($name . '.')->group(function () use ($guard, $register) {
                Route::get('login', 'indexLogin')->name('login')->defaults('guard', $guard);
                Route::post('login', 'login')->name('login.submit')->defaults('guard', $guard);

                if ($register) {
                    Route::get('register', 'indexRegister')->name('register')->defaults('guard', $guard);
                    Route::post('register', 'register')->name('register.submit')->defaults('guard', $guard);
                }
                Route::get('forgetpassword', 'indexforgetpassword')->name('forgetpassword')->defaults('guard', $guard);
                Route::post('forgetpassword', 'forgetpassword')->name('forgetpassword.submit')->defaults('guard', $guard);
                Route::get('resetpassword/{token}', 'indexResetpassword')->name('resetpassword')->defaults('guard', $guard);
                Route::post('resetpassword', 'resetpassword')->name('resetpassword.submit')->defaults('guard', $guard);
            });
            Route::prefix($prefix)->controller($dashboardController)->name($name . '.')->middleware("check.guard:$guard")->group(function () use ($guard) {
                Route::get('/dashboard', function () use ($guard) {
                    return view("$guard.dashboard");
                })->name('dashboard')->defaults('guard', $guard);
            });
        });
    }
}
