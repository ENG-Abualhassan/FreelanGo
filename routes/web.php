<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\freelancer\FreelancerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;



// Admins
Route::authGuard('admins' , 'admins' , 'admins' , AdminController::class , false);

// Freelancers
Route::authGuard('freelancers' , 'freelancers' , 'freelancers' , FreelancerController::class);

// Users
Route::authGuard('' , 'web' , 'web' , UserController::class);

Route::get('verify-email/{guard}', [EmailVerificationController::class, 'verify'])->name('verfication')->where('guard', 'web|freelancers');

