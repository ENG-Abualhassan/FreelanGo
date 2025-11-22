<?php

use App\Http\Controllers\freelancer\FreelancerController;
use Illuminate\Support\Facades\Route;


$prefix = $name = $guard = 'freelancers';
Route::authGuard($prefix , $name , $guard , FreelancerController::class);

Route::prefix($prefix)->name($name.'.')
->middleware("check.guard:$guard")
->controller(FreelancerController::class)
->group(function (){
      Route::get('/showFreelancers',  'showFreelancers')->name('showFreelancers');
      Route::get('/getFreelancerData',  'getFreelancerData')->name('getFreelancerData');
});