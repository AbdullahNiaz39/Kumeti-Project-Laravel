<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KumetiDefinationController;
use App\Http\Controllers\KumetiMemberRegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MembersListController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnKumetiController;
use App\Http\Controllers\UserController;
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
Route::get('/login_admin', [LoginController::class, 'index']);
Route::post('/auth', [LoginController::class, 'auth'])->name('log_auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    ///users///
    Route::get('/users', [UserController::class, 'users']);
    Route::get('/manage_users', [UserController::class, 'manage_users']);
    Route::get('/manage_users/{id}', [UserController::class, 'manage_users']);
    Route::post('/manage_users_process', [UserController::class, 'manage_users_process'])->name('manage_users_process');
    Route::get('/delete_user/{id}', [UserController::class, 'delete']);

    ///kumeti_defination///
    Route::get('/kumeti_defination', [KumetiDefinationController::class, 'index']);
    Route::get('/manage_kumeti_defination', [KumetiDefinationController::class, 'manage_kumeti_defination']);
    Route::get('/manage_kumeti_defination/{id}', [KumetiDefinationController::class, 'manage_kumeti_defination']);
    Route::post('/manage_kumeti_defination_process', [KumetiDefinationController::class, 'manage_kumeti_defination_process'])->name('manage_kumeti_defination_process');
    Route::get('/delete_kumeti_defination/{id}', [KumetiDefinationController::class, 'delete']);

    ///Member_list///
    Route::get('/members_list', [MembersListController::class, 'index']);
    Route::get('/manage_members_list', [MembersListController::class, 'manage_members_list']);
    Route::get('/manage_members_list/{id}', [MembersListController::class, 'manage_members_list']);
    Route::post('/manage_members_list_process', [MembersListController::class, 'manage_members_list_process'])->name('manage_members_list_process');
    Route::get('/delete_members_list/{id}', [MembersListController::class, 'delete']);
    Route::get('graunter_list_delete/{id}/{mid}', [MembersListController::class, 'graunter_list_delete']);

    //Recovery //
    Route::get('/recovery', [RecoveryController::class, 'index']);
    Route::post('/getkumeti_code', [RecoveryController::class, 'getkumeti_code']);
    Route::get('/manage_recovery', [RecoveryController::class, 'manage_recovery']);
    Route::get('/manage_recovery/{id}', [RecoveryController::class, 'manage_recovery']);
    Route::post('/manage_recovery_process', [RecoveryController::class, 'manage_recovery_process'])->name('manage_recovery_process');
    Route::get('/delete_recovery/{id}', [RecoveryController::class, 'delete']);

    //Kumeti member Registration//
    Route::get('/kumeti_member_registration', [KumetiMemberRegistrationController::class, 'index']);
    Route::post('/getkumeti', [KumetiMemberRegistrationController::class, 'getkumeti']);
    Route::post('/member_detail', [KumetiMemberRegistrationController::class, 'member_detail']);
    Route::get('/manage_kumeti_member_registration', [KumetiMemberRegistrationController::class, 'manage_kumeti_member_registration']);
    Route::get('/manage_kumeti_member_registration/{id}', [KumetiMemberRegistrationController::class, 'manage_kumeti_member_registration']);
    Route::post('/manage_kumeti_member_registration_process', [KumetiMemberRegistrationController::class, 'manage_kumeti_member_registration_process'])->name('manage_kumeti_member_registration_process');
    Route::get('/delete_kumeti_member_registration/{id}', [KumetiMemberRegistrationController::class, 'delete']);

    //ReturnKumeti//
    Route::get('/return_kumeti', [ReturnKumetiController::class, 'index']);
    Route::get('/manage_return_kumeti', [ReturnKumetiController::class, 'manage_return_kumeti']);
    Route::get('/manage_return_kumeti/{id}', [ReturnKumetiController::class, 'manage_return_kumeti']);
    Route::post('/manage_return_kumeti_process', [ReturnKumetiController::class, 'manage_return_kumeti_process'])->name('manage_return_kumeti_process');
    Route::get('/delete_return_kumeti/{id}', [ReturnKumetiController::class, 'delete']);

    //city//
    Route::get('/city', [CityController::class, 'index']);
    Route::get('/manage_city', [CityController::class, 'manage_city']);
    Route::get('/manage_city/{id}', [CityController::class, 'manage_city']);
    Route::post('/manage_city_process', [CityController::class, 'manage_city_process'])->name('manage_city_process');
    Route::get('/delete_city/{id}', [CityController::class, 'delete']);
    ////// End/////
    Route::get('/reports', [ReportController::class, 'index']);

    Route::get('/logout', function () {
        session()->forget('login');
        session()->forget('checklogin');
        session()->forget('USER_NAME');
        session()->flash('error', 'User Logout');
        return redirect('/login_admin');

    });

});
