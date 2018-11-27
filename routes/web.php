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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/profile/create', 'CompanyController@create');
Route::post('/home/profile/create', 'CompanyController@store')->name('createProfile');

Route::get('/home/departments/', 'DepartmentController@index');
Route::post('/home/departments/', 'DepartmentController@store')->name('addDepartment');
Route::delete('/home/departments/{id}', 'DepartmentController@destroy')->name('deleteDepartment');
