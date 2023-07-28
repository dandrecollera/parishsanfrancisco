<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmailTest;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PriestController;

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


Route::get('/', function(){
    return redirect('https://public.parishsanfrancisco.com/');
});

Route::get('/login', [LoginController::class, 'index'])->name('LoginScreen')->middleware('session.exist');
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
    Route::get('/admin', [AdminController::class, 'home'])->name('AdminHome');

    // /adminuser : User Accounts
    Route::get('/adminuser', [AdminController::class, 'adminuser'])->name('AdminUser');
    Route::get('/adminuser_add', [AdminController::class, 'adminuser_add'])->name('AdminUserAdd');
    Route::post('/adminuser_add_process', [AdminController::class, 'adminuser_add_process'])->name('AdminUserAddProcess');
    Route::get('/adminuser_edit', [AdminController::class, 'adminuser_edit'])->name('AdminUserEdit');
    Route::post('/adminuser_edit_process', [AdminController::class, 'adminuser_edit_process'])->name('AdminUserEditProcess');
    Route::post('/adminuser_pass_process', [AdminController::class, 'adminuser_pass_process'])->name('AdminUserPassProcess');
    Route::get('/adminuser_lock_process', [AdminController::class, 'adminuser_lock_process'])->name('AdminUserLockProcess');
    Route::get('/adminuser_unlock_process', [AdminController::class, 'adminuser_unlock_process'])->name('AdminUserUnlockProcess');

    // /adminpriest : Parish Priests
    Route::get('/adminpriest', [PriestController::class, 'adminpriest'])->name('AdminPriest');
    Route::get('/adminpriest_add', [PriestController::class, 'adminpriest_add'])->name('AdminPriestAdd');
    Route::post('/adminpriest_add_process', [PriestController::class, 'adminpriest_add_process'])->name('AdminPriestAddProcess');
    Route::get('/adminpriest_edit', [PriestController::class, 'adminpriest_edit'])->name('AdminPriestEdit');
    Route::post('/adminpriest_edit_process', [PriestController::class, 'adminpriest_edit_process'])->name('AdminPriestEditProcess');
    Route::get('/adminpriest_lock_process', [PriestController::class, 'adminpriest_lock_process'])->name('AdminPriestLockProcess');
    Route::get('/adminpriest_unlock_process', [PriestController::class, 'adminpriest_unlock_process'])->name('AdminPriestUnlockProcess');

});
