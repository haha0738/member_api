<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('members', 'MemberController@store');
Route::get('members', 'MemberController@index');
Route::get('member/new', 'MemberController@create');
Route::get('member/{id}/edit', 'MemberController@edit');
Route::delete('member/{id}', 'MemberController@destroy');
Route::put('member/{id}', 'MemberController@update');
Route::get('member/{id}', 'MemberController@show');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


