<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::post('store', [UserController::class, 'store'])->name('store');
Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::put('update/{id}', [UserController::class, 'update'])->name('update');
