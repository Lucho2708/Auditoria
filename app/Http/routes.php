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

use \Auditoria\Http\Middleware\IsAuditor;

Route::get('/',[
    'uses' => 'HomeController@index',
    'as'=>'home'

    ]);

Route::group(['middleware'=>'auth:admin','prefix' => 'admin'], function () {

    Route::resource('users','UsersController');
    Route::resource('recibo','ReciboController');
    
});

Route::get('users/{id}/destroy',[
    'uses' => 'UsersController@destroy',
    'as'=>'auditor.users.destroy'
]);


Route::get('recibo/{id}/destroy',[
    'uses' => 'ReciboController@destroy',
    'as'=>'auditor.recibo.destroy'
]);

Route::group(['middleware'=>'auth:edit','prefix' => 'edit'], function () {

    Route::resource('users','EditUserController');
    Route::resource('recibo','EditReciboController');

});


Route::group(['middleware'=>'auth:member','prefix' => 'member'], function () {

    Route::resource('users','MemberUserController');
    Route::resource('recibo','MemberReciboController');

});


// Authentication routes...
Route::get('login', [

    'uses'=>'Auth\AuthController@getLogin',
    'as'=>'login'

]);
Route::post('login', [
    'uses'=>'Auth\AuthController@postLogin',
    'as'=>'login'
]);
Route::get('logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'=>'logout'
]);

// Registration routes...
Route::get('register', [
    'uses'=>'Auth\AuthController@getRegister',
    'as'=>'register'
]);
Route::post('register', [
    'uses'=>'Auth\AuthController@postRegister',
    'as'=>'register'
]);

// Password reset link request routes...
Route::get('email', 'Auth\PasswordController@getEmail');
Route::post('email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('reset/{token}', 'Auth\PasswordController@getReset');
Route::post('reset', 'Auth\PasswordController@postReset');