<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\almsController;
use App\Http\Controllers\adminController;


Route::get('/', [almsController::class, 'index'])->name('home')->middleware('auth.basic');
Route::get('/create', [almsController::class, 'create']);
Route::post('/create', [almsController::class, 'store']);


Route::get('/login', [adminController::class, 'login'])->name('login');
Route::post('/login', [adminController::class, 'logUser'])->name('login');

Route::get('/register', [adminController::class, 'register'])->name('register');
Route::post('/register', [adminController::class, 'store']);

Route::get('/show/{id}', [almsController::class, 'show'])->middleware('auth.basic');

Route::delete('/{id}', [almsController::class, 'destroy'])->name('destroy')->middleware('auth.basic');

Route::get('/edit/{id}', [almsController::class, 'edit']);
Route::patch('/edit/{id}', [almsController::class, 'update']);
