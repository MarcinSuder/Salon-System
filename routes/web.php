<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pages', 'PagesController');

Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('warehouses', 'WarehouseController');
Route::resource('clients', 'ClientsController');

Route::resource('appointments', 'AppointmentsController');

Route::post('/appointments/add/appointments','AppointmentsController@add');
Route::post('/appointments/edit/appointments','AppointmentsController@editUsed');
Route::get('/appointments/used/products/{id}','AppointmentsController@used');
Route::get('/appointments/used/remove/{id}','AppointmentsController@removeUsed');
Route::get('/showappointments/{id}','ClientsController@appointments');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
