<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EmailTest;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PriestController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\PricesController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\User\UserController;

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

Route::get('/generatePDF', [PDFController::class, 'generatePDF'])->name('generatePDF');
Route::get('/getMunicipality/{province}', [LoginController::class, 'getMunicipality'])->name('GetMunicipality');

Route::group(['middleware' => 'session.exist'], function(){
    Route::get('/', [PublicController::class, 'home'])->name('home');
    Route::get('/about', [PublicController::class, 'about'])->name('about');
    Route::get('/services', [PublicController::class, 'services'])->name('services');
    Route::post('/public_donation', [PublicController::class, 'public_donation'])->name('public_donation');
    Route::get('/faqs', [PublicController::class, 'faqs'])->name('faqs');

    Route::get('/login', [LoginController::class, 'index'])->name('LoginScreen')->middleware('session.exist');
    Route::post('/loginProcess', [LoginController::class, 'loginProcess'])->name('LoginProcess');


    // Registration
    Route::get('/register', [LoginController::class, 'register'])->name('RegisterScreen');
    Route::post('/registration', [LoginController::class, 'registerProcess'])->name('RegistrationProcess');

    // Verification
    Route::get('/verification', [LoginController::class, 'verification'])->name('OTPVerificationPage');
    Route::post('/checkOTP', [LoginController::class, 'checkOTP'])->name('checkOTP');
    Route::get('/requestOTP', [LoginController::class, 'requestOTP'])->name('RequestOTP');
});


Route::group(['middleware' => 'axuauth'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('LogoutProcess');
    // ADMIN
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

    // /adminvolunteer : Parish Volunteers
    Route::get('/adminvolunteer', [VolunteerController::class, 'adminvolunteer'])->name('AdminVolunteer');
    Route::get('/adminvolunteer_add', [VolunteerController::class, 'adminvolunteer_add'])->name('AdminVolunteerAdd');
    Route::post('/adminvolunteer_add_process', [VolunteerController::class, 'adminvolunteer_add_process'])->name('AdminVolunteerAddProcess');
    Route::get('/adminvolunteer_edit', [VolunteerController::class, 'adminvolunteer_edit'])->name('AdminVolunteerEdit');
    Route::post('/adminvolunteer_edit_process', [VolunteerController::class, 'adminvolunteer_edit_process'])->name('AdminVolunteerEditProcess');
    Route::get('/adminvolunteer_lock_process', [VolunteerController::class, 'adminvolunteer_lock_process'])->name('AdminVolunteerLockProcess');
    Route::get('/adminvolunteer_unlock_process', [VolunteerController::class, 'adminvolunteer_unlock_process'])->name('AdminVolunteerUnlockProcess');

    // /admincalendar : Calendar Settings
    Route::get('/admincalendar', [CalendarController::class, 'admincalendar'])->name('AdminCalendar');
    Route::get('/admincalendar_time', [CalendarController::class, 'admincalendar_time'])->name('AdminCalendarTime');
    Route::get('/admincalendar_time_add', [CalendarController::class, 'admincalendar_time_add'])->name('AdminCalendarAddTime');
    Route::post('/admincalendar_time_add_process', [CalendarController::class, 'admincalendar_time_add_process'])->name('AdminCalendarAddTimePrcess');
    Route::get('/getDataForDay', [CalendarController::class, 'getDataForDay'])->name('getDataForDay');
    Route::get('/getScheduleForDay', [CalendarController::class, 'getScheduleForDay'])->name('getScheduleForDay');
    Route::get('/admincalendar_time_delete_process', [CalendarController::class, 'admincalendar_time_delete_process'])->name('admincalendar_time_delete_process');

    // /adminprices : Service Prices
    Route::get('/adminprices', [PricesController::class, 'adminprices'])->name('adminprices');
    Route::get('/adminprices_update', [PricesController::class, 'adminprices_update'])->name('adminprices_update');

    // /adminappointment : Appointment List
    Route::get('/adminappointment', [AppointmentController::class, 'adminappointment'])->name('adminappointment');
    Route::get('/adminadditionalinfo', [AppointmentController::class, 'adminadditionalinfo'])->name('adminadditionalinfo');
    Route::get('/adminstatusupdate', [AppointmentController::class, 'adminstatusupdate'])->name('adminstatusupdate');
    Route::post('/adminstatusupdate_process', [AppointmentController::class, 'adminstatusupdate_process'])->name('adminstatusupdate_process');
    Route::post('/approved_certi', [AppointmentController::class, 'approved_certi'])->name('approved_certi');


    // /adminreports : Reports Graph
    Route::get('/adminreport', [ReportsController::class, 'adminreport'])->name('adminreport');
    Route::get('/reservationDataMonth', [ReportsController::class, 'reservationDataMonth'])->name('reservationDataMonth');
    Route::get('/moneyDataMonth', [ReportsController::class, 'moneyDataMonth'])->name('moneyDataMonth');
    Route::get('/reservationDataYear', [ReportsController::class, 'reservationDataYear'])->name('reservationDataYear');
    Route::get('/moneyDataMonthYear', [ReportsController::class, 'moneyDataMonthYear'])->name('moneyDataMonthYear');

    // USER
    Route::get('/home', [UserController::class, 'userhome'])->name('userhome');
    Route::get('/userabout', [UserController::class, 'userabout'])->name('userabout');
    Route::get('/userservices', [UserController::class, 'userservices'])->name('userservices');
    Route::post('/user_donation', [UserController::class, 'user_donation'])->name('user_donation');
    Route::get('/userfaqs', [UserController::class, 'userfaqs'])->name('userfaqs');
    Route::get('/usercalendar', [UserController::class, 'usercalendar'])->name('usercalendar');
    Route::get('/userreservation', [UserController::class, 'userreservation'])->name('userreservation');
    Route::get('/userhistory', [UserController::class, 'userhistory'])->name('userhistory');
    Route::get('/additionalinfo', [UserController::class, 'additionalinfo'])->name('additionalinfo');


    // USER: Calendar AJAX
    Route::get('/getDataForDayUser', [UserController::class, 'getDataForDayUser'])->name('getDataForDayUser');
    Route::get('/getScheduleForDayUser', [UserController::class, 'getScheduleForDayUser'])->name('getScheduleForDayUser');


    // USER: Create Reservation
    Route::post('/baptism_add_process', [UserController::class, 'baptism_add_process'])->name('baptism_add_process');
    Route::post('/funeral_add_process', [UserController::class, 'funeral_add_process'])->name('funeral_add_process');
    Route::post('/anoint_add_process', [UserController::class, 'anoint_add_process'])->name('anoint_add_process');
    Route::post('/blessing_add_process', [UserController::class, 'blessing_add_process'])->name('blessing_add_process');
    Route::post('/kumpil_add_process', [UserController::class, 'kumpil_add_process'])->name('kumpil_add_process');
    Route::post('/communion_add_process', [UserController::class, 'communion_add_process'])->name('communion_add_process');
    Route::post('/wedding_add_process', [UserController::class, 'wedding_add_process'])->name('wedding_add_process');
    Route::post('/user_request', [UserController::class, 'user_request'])->name('user_request');

});
