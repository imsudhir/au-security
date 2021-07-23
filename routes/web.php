<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RequirementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('', [LandingpageController::class, 'Landingpage']);

Route::get('/career', [LandingpageController::class, 'guard_application_form']);
Route::post('/career/guard_application_form_process', [LandingpageController::class, 'guard_application_form_process'])->name('frontend.guard_application_form_process');

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
// guard management
    Route::get('admin/guard', [UsersController::class, 'index']);
    Route::get('admin/guard/manage_guard', [UsersController::class, 'manage_guard']);
    Route::get('admin/guard/manage_guard/{id}', [UsersController::class, 'manage_guard']);
    Route::post('admin/guard/manage_guard_process', [UsersController::class, 'manage_guard_process'])->name('guard.manage_guard_process');
    Route::get('admin/guard/delete/{id}', [UsersController::class, 'delete']);
    Route::get('admin/guard/verify_status/{status}/{id}', [UsersController::class, 'verify_status']);
    Route::get('admin/guard/active_status/{status}/{id}', [UsersController::class, 'active_status']);
    Route::get('admin/guard/view_details/{id}', [UsersController::class, 'view_details']);
    Route::get('admin/guard/send_guard_credentials/{id}', [MailController::class, 'sendAuMail']);

    // guard management

 //new jobs
 Route::get('admin/newjobs', [RequirementController::class, 'index']);
 Route::get('admin/newjobs/approve/{status}/{id}', [RequirementController::class, 'approve']);
 Route::get('admin/newjobs/broadcast/{id}', [RequirementController::class, 'broadcast']);

 //product management
 Route::get('admin/product', [ProductController::class, 'index']);
 Route::get('admin/product/manage_product', [ProductController::class, 'manage_product']);
 Route::get('admin/product/manage_product/{id}', [ProductController::class, 'manage_product']);
 Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('admin.manage_product_process');
 Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
 Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
 
    // Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
    Route::get('admin/logout', function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('TOTAL_GUARD');
        session()->flash('error','Logout Successfully');
    return redirect('admin');
    });
});
//end of admin panel

//start of guard panel

Route::get('guard', [UsersController::class, 'guard']);
Route::post('guard/auth', [UsersController::class, 'auth'])->name('guard.auth');
Route::group(['middleware'=>'guard_auth'], function(){
Route::get('guard/dashboard', [UsersController::class, 'dashboard']);
Route::get('guard/newjobs', [UsersController::class, 'newjobs']);
Route::get('guard/myJobs', [JobsController::class, 'myJobs']);
Route::get('guard/job-details/{id}', [JobsController::class, 'jobdetails']);
Route::get('guard/newjobs/accept/{id}', [JobsController::class, 'accept']);
Route::get('guard/attendance/{id}', [JobsController::class, 'attendance_mgmt']);
Route::post('/guard/attendance/signin/{jobid}', [JobsController::class, 'signin']);
Route::post('/guard/attendance/signout/{jobid}', [JobsController::class, 'signout']);

Route::get('guard/attendance_management/{id}', [AttendanceController::class, 'attendance_mgmt']);
Route::post('/guard/attendance_management/signin/{jobid}', [AttendanceController::class, 'signin']);
Route::post('/guard/attendance_management/signout/{jobid}', [AttendanceController::class, 'signout']);
 
   
 
    // Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
    Route::get('guard/logout', function(){
        session()->forget('GUARD_LOGIN');
        session()->forget('GUARD_ID');
        session()->flash('error','Logout Successfully');
    return redirect('guard');
    });
});
//end of client panel

//start of client panel
Route::get('client', [ClientController::class, 'client']);
Route::post('client/auth', [ClientController::class, 'client_auth'])->name('client.client_auth');
Route::group(['middleware'=>'client_auth'], function(){
// Route::get('client/dashboard', [UsersController::class, 'client_dashboard']);
Route::get('/client/jobs', [ClientController::class, 'clientJobs']);
Route::get('/client/job/manage_job', [ClientController::class, 'job_manage']);
Route::get('/client/job/manage_job/{id}', [ClientController::class, 'manage_job']);
Route::post('/client/job/manage_job_process', [ClientController::class, 'manage_job_process'])->name('client.manage_job_process');
Route::post('/client/job/update_job_status', [ClientController::class, 'update_job_status'])->name('admin.update_job_status');

    // Route::get('admin/updatepassword', [AdminController::class, 'updatepassword']);
    Route::get('client/logout', function(){
        session()->forget('CLIENT_LOGIN');
        session()->forget('CLIENT_ID');
        session()->flash('error','Logout Successfully');
    return redirect('client');
    });
});
