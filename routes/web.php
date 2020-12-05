<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
| Authentication routes of the application
|
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| General|Public Routes
|--------------------------------------------------------------------------
| Basically anyone can access this routes
|
*/
Route::get('/', fn() => view('welcome'))->name('home');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
|
| Routes for authenticated users, a default user
|
*/
Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Routes for low level functionality of the system, the most lethal routes I would say
|
*/

Route::group([
    'middleware' => ['verified', 'auth'], 
    'namespace' => 'Admin', 
    'prefix' => 'admin',
    'as' => 'admin.'], function(){
        Route::resource('levels', LevelsController::class);
        Route::resource('streams', StreamsController::class);
        Route::resource('departments', DepartmentsController::class);
        Route::resource('subjects', SubjectsController::class);
});

/*
|--------------------------------------------------------------------------
| Elevated User Routes
|--------------------------------------------------------------------------
|
| Routes for low level functionality of the system, the most lethal routes I would say
|
*/

Route::group([
    'middleware' => ['verified', 'auth'], 
    'namespace' => 'User', 
    'prefix' => 'user',
    'as' => 'user.'], function(){
        Route::resource('students', StudentsController::class);
});

/*
|--------------------------------------------------------------------------
| Students Routes
|--------------------------------------------------------------------------
|
| Routes for low level functionality of the system, the most lethal routes I would say
|
*/
Route::group([
    'namespace' => 'Student', 
    'middleware' => ['auth:student'], 
    'prefix' => 'student', 
    'as' => 'student.'], function(){
        Route::get('/dashboard', DashboardController::class)->name('dashboard');
});