<?php

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
Route::resource('email','Admin\EmailController');
Route::get('emails-index','Admin\EmailController@index')->name('email.index');
Route::get('emails-create','Admin\UserController@employeeCreate')->name('email.create');
Route::resource('user','Admin\UserController');
Route::get('users-index','Admin\UserController@index')->name('user.index');
Route::get('users-create','Admin\UserController@create')->name('user.create');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::resource('offert','Admin\OffertController');
Route::get('offert-index','Admin\OffertController@index')->name('offert.index');
Route::get('all-offert','Admin\OffertController@allOffert')->name('all.offert');
Route::get('offert-create','Admin\OffertController@create')->name('offert.create');
Route::post('offert-apply','Admin\OffertController@offertApply')->name('offert.apply');

Route::resource('document','Admin\DocumentController');
Route::get('document-index','Admin\DocumentController@index')->name('document.index');
Route::post('document-apply','Admin\DocumentController@documentApply')->name('document.apply');

Route::resource('salaries','Admin\SalaryController');
Route::get('salary-index','Admin\SalaryController@index')->name('salary.index');
Route::get('salary-create','Admin\SalaryController@create')->name('salary.create');
Route::post('salary-apply','Admin\SalaryController@salaryApply')->name('salary.apply');
Route::post('salary-approved-apply','Admin\SalaryController@salaryApprovedApply')->name('salary.approved.apply');

Route::post('select-role-apply','Admin\UserController@selectRoleApply')->name('select.role.apply');
Route::resource('attendance','Admin\AttendanceController');
Route::post('attendance-apply','Admin\AttendanceController@attendanceApply');
Route::get('salary-approved-index','Admin\SalaryController@salaryApprovedIndex')->name('salary.approved.index');
Route::post('approved-salary','Admin\SalaryController@approvedSalary')->name('approved.salary');
Route::get('/changeStatus', 'Admin\UserController@changeStatus');

Route::resource('hr','Admin\HrController');
Route::get('hr-create','Admin\HrController@create')->name('hr.create');
Route::get('hr-index','Admin\HrController@index')->name('hr.index');

Route::resource('account','Admin\AccountController');
Route::get('account-create','Admin\AccountController@create')->name('account.create');
Route::get('account-index','Admin\AccountController@index')->name('account.index');

Route::resource('employee','Admin\EmployeeController');
Route::get('employee-index','Admin\EmployeeController@index')->name('employee.index');
Route::get('employee-create','Admin\EmployeeController@create')->name('employee.create');

Route::resource('sale_leader','Admin\LeaderController');
Route::get('sale_leader-index','Admin\LeaderController@index')->name('sale_leader.index');
Route::get('sale_leader-create','Admin\LeaderController@create')->name('sale_leader.create');

Route::resource('supervisor','Admin\SupervisorController');
Route::get('supervisor-index','Admin\supervisorController@index')->name('supervisor.index');
Route::get('supervisor-create','Admin\supervisorController@create')->name('supervisor.create');

Route::resource('seller','Admin\SellerController');
Route::get('seller-index','Admin\SellerController@index')->name('seller.index');
Route::get('seller-create','Admin\SellerController@create')->name('seller.create');

Route::resource('client','Admin\ClientController');
Route::get('client-index','Admin\ClientController@index')->name('client.index');
Route::get('client-create','Admin\ClientController@create')->name('client.create');

Route::resource('time','Admin\TimeController');
Route::get('time-index','Admin\TimeController@index')->name('time.index');
Route::get('all-time-report','Admin\TimeController@allTimeReport')->name('all.time.report');
Route::post('time-report-apply','Admin\TimeController@timeReportApply')->name('time.report.apply');
Route::post('all-time-report-apply','Admin\TimeController@allTimeReportApply')->name('all.time.report.apply');
Route::get('/department-change','Admin\TimeController@departmentChange');

Route::resource('role','Admin\RoleController');
Route::get('role-index','Admin\RoleController@index')->name('role.index');
Route::get('role-create','Admin\RoleController@create')->name('role.create');

