<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\permission\AdminPermission;
use Illuminate\Support\Facades\Route;


$prefix = $name = $guard = 'admins';
Route::authGuard($prefix, $name, $guard, AdminController::class, false);

Route::prefix($prefix)->name($name . '.')
      ->middleware("check.guard:$guard")
      ->controller(AdminController::class)
      ->group(function () {
            Route::get('/showAdmins', 'showAdmins')->name('showAdmins');
            Route::get('/getAdminData', 'getAdminData')->name('getAdminData');
            Route::get('/showFreelancers', 'showFreelancers')->name('showFreelancers');
            Route::get('/getFreelancerData', 'getFreelancerData')->name('getFreelancerData');
            Route::get('/showUsers', 'showUsers')->name('showUsers');
            Route::get('/getUserData', 'getUserData')->name('getUserData');
            Route::post('/createAdmin', 'createAdmin')->name('createAdmin');
            Route::get('/showAdminInfo/{id}', 'showAdminInfo')->name('showAdminInfo');
            Route::post('/editAdmin', 'editAdmin')->name('editAdmin');
            Route::post('/deleteAdmin', 'deleteAdmin')->name('deleteAdmin');
            Route::prefix('permission')->name('permission.')->controller(AdminPermission::class)->group(function () {
                  Route::get('index', 'index')->name('index');
                  Route::get('getPermissionData', 'getPermissionData')->name('getPermissionData');
                  Route::post('createPermission', 'createPermission')->name('createPermission');
                  Route::get('/showPermissionInfo/{id}', 'showPermissionInfo')->name('showPermissionInfo');
                  Route::post('/deletePermission', 'deletePermission')->name('deletePermission');
            });

      });