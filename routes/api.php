<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('car', 'CarController')->except(['index']);
Route::post('cars', 'CarController@index');

Route::resource('employee', 'EmployeeController')->except(['index']);
Route::post('employees', 'employeeController@index');

Route::get('branch/select', 'BranchesController@select');
Route::resource('branch', 'BranchesController')->except(['index']);
Route::post('branches', 'BranchesController@index');
