<?php

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
Route::get('/admin_register',[App\Http\Controllers\Auth\RegisterController::class,'showAdminRegistrationForm']);
Route::post('/create_admin',[App\Http\Controllers\Auth\RegisterController::class,'adminRegister'])->name('create_admin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
