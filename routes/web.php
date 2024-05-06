<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PilgrimController;
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

Auth::routes();
Route::get('/admin_register',[RegisterController::class,'showAdminRegistrationForm']);
Route::post('/create_admin',[RegisterController::class,'adminRegister'])->name('create_admin');

Route::get('/pilgrim',[PilgrimController::class,'index'])->name('pilgrim.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
