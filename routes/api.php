<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees', 'ApiController@getAllEmployees');
Route::get('employees/{id}', 'ApiController@getEmployee');
Route::post('employees', 'ApiController@createEmployee');
Route::put('employees/{id}', 'ApiController@updateEmployee');
Route::delete('employees/{id}','ApiController@deleteEmployee');

Route::post('payroll', 'ApiController@createPayroll');
Route::get('payroll/{id}', 'ApiController@getPayroll');

Route::post('add_working_days', 'ApiController@addEmployeeWorkingDays');

Route::get('downloadPDF/{id}','ApiController@downloadPDF');
Route::get('sendEmailPDF/{id}','ApiController@sendEmailPDF');
