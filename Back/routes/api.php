<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SavedJobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TeamMemberController;
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
    Route::post('/complete-profile', [UserController::class, 'completeProfile']);
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
    Route::apiResource('education',EducationController::class);
    Route::apiResource('project',ProjectController::class);
    Route::apiResource('language',LanguageController::class);
    Route::post('skills',[SkillController::class,'store']);
});


Route::group([
    'middleware' => 'api',
],function(){
    Route::apiResource('employee',EmployeeController::class);
    Route::patch('update-profile',[UserController::class,'updateProfile']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'company'
],function(){
    Route::apiResource('team-member',TeamMemberController::class);
    Route::apiResource('location',LocationController::class);
    Route::apiResource('benefit',BenefitController::class);
    Route::get('/',[CompanyController::class,'index']);
});

Route::group([
    'middleware' => 'api',
],function(){
    Route::apiResource('job',JobController::class);
    Route::apiResource('saved-job',SavedJobController::class);
});

