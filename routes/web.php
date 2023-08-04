<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

Route::get('/list-users', [UsersController::class, 'index']);
Route::post('/list-users', [UsersController::class, 'create']);

Route::get('/list-departements', [DepartementsController::class, 'index']);
Route::post('/list-departements', [DepartementsController::class, 'create']);

Route::get('/list-employee', [EmployeeController::class, 'index']);
Route::post('/list-employee', [EmployeeController::class, 'create']);
