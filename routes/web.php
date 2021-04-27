<?php

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


// company routing
	
// Route::resources(['company' => 'ComapnyController']);
Route::get('login','Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@adminLogin');
Route::group(['middleware' => 'auth:admin'], function () {

	Route::resource('company', 'ComapnyController');
	Route::get('company/delete/{id}/','ComapnyController@delete');
	 
	 // emplyee routing
	Route::resources(['employee' => 'EmployeeController']);
	Route::get('employee/delete/{id}/','employeeController@delete');

	Route::get('logout','Auth\LoginController@logout');

	Route::get('/', function () {
	    return view('index');
	});
});


