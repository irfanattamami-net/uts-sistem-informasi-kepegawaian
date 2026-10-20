<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::resource('employees', EmployeeController::class)
    ->except(['show']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('departments', DepartmentController::class)
    ->except(['show']);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
