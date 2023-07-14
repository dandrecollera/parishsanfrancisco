<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailTest;

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


Route::get('/test', [EmailTest::class, 'index'])->name('TestEmail');

// Login and Register
Route::get('/', [LoginController::class, 'index'])->name('LoginScreen');
Route::get('/register', [LoginController::class, 'register'])->name('RegisterScreen');
Route::get('/getMunicipality/{province}', [LoginController::class, 'getMunicipality'])->name('GetMunicipality');

