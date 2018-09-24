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
//phpinfo();




Route::get('/login', function(){

	return view('login');
});
Route::get('/home', function(){
	return view('home');
});
Route::get('/changepwd', function(){
	return view('changepwd');
});

Route::post('/changepwd','ManagersController@store');
Route::post('/login','ManagersController@index');
Route::post('/bound','ManagersController@setbound');
Route::post('/home','ManagersController@show');