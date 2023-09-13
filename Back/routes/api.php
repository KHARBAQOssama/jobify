<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkExperienceController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    Route::put('/initialize-role', [AuthController::class, 'initializeRole']);
    Route::post('/complete-profile', [AuthController::class, 'completeProfile']);
});

Route::group([
    'middleware' => 'api',
    'prefix' =>'password'
],function(){
    Route::post('reset-password',[AuthController::class , 'resetPassword']);
    Route::post('reset',[AuthController::class , 'reset']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'profile'
],function(){
    Route::patch('contact-info/{contact_information}',[ContactInformationController::class,'update']);
    Route::patch('password',[UserController::class,'changePassword']);
    Route::patch('email',[UserController::class,'changeEmail']);
    Route::patch('summary',[EmployeeController::class,'updateSummary']);
    Route::patch('expected-salary',[EmployeeController::class,'updateExpectedSalary']);
    Route::apiResource('work-experience',WorkExperienceController::class);
});