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



Route::get('/', function(){
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('LoginScreen');
Route::get('/logout', [LoginController::class, 'logout'])->name('LogoutProcess');
Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('LoginProcess');


// Registration
Route::get('/register', [LoginController::class, 'register'])->name('RegisterScreen');
Route::get('/getMunicipality/{province}', [LoginController::class, 'getMunicipality'])->name('GetMunicipality');
Route::post('/registration', [LoginController::class, 'registerProcess'])->name('RegistrationProcess');

// Verification
Route::get('/verification', [LoginController::class, 'verification'])->name('OTPVerificationPage');
Route::post('/checkOTP', [LoginController::class, 'checkOTP'])->name('RegistrationProcess');
Route::get('/requestOTP', [LoginController::class, 'requestOTP'])->name('RequestOTP');


Route::group(['middleware' => 'axuauth'], function(){

});
