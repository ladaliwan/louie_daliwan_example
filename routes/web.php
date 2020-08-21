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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){

Route::get('/employees', 'EmployeeUsersController@index')->name('employee.home');
Route::get('/employees/create', 'EmployeeUsersController@create');
Route::post('/employees', 'EmployeeUsersController@store');
Route::get('/employees/{user}/edit', 'EmployeeUsersController@edit');
Route::put('/employees/{user}',  'EmployeeUsersController@update');
Route::delete('/employees/{user}', 'EmployeeUsersController@destroy');

Route::get('/access-levels', 'AccessLevelsController@index');
Route::get('/access-levels/create', 'AccessLevelsController@create');
Route::post('access-levels', 'AccessLevelsController@store');
Route::get('/access-levels/{accessLevel}/edit', 'AccessLevelsController@edit');
Route::put('/access-levels/{accessLevel}', 'AccessLevelsController@update');
Route::delete('/access-levels/{accessLevel}', 'AccessLevelsController@destroy');
});


Route::get('/home', 'HomeController@index')->name('home');
