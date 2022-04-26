<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('home.index');
});

// Home
Route::get('/home', [HomeController::class, 'index']);

// Sign-Up
Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);

// Sign-In
Route::get('/signin', [SigninController::class, 'index'])->name('login')->middleware('guest');
Route::post('/signin', [SigninController::class, 'authenticate']);
// Sign-Out
Route::post('/signout', [SigninController::class, 'signout']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Warehouse
Route::get('/warehouse', [WarehouseController::class, 'index'])->middleware('auth');
Route::get('/warehouse/create', [WarehouseController::class, 'create']);
Route::post('/warehouse', [WarehouseController::class, 'store']);
Route::get('/warehouse/{warehouse}/edit', [WarehouseController::class, 'edit']);
Route::patch('/warehouse/{warehouse}', [WarehouseController::class, 'update']);
Route::delete('/warehouse/{warehouse}', [WarehouseController::class, 'destroy']);

// User
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);