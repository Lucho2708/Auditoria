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
    'middleware'=>'guest',
    'uses' => 'HomeController@index',
    'as'=>'home'

]);

Route::group(['middleware'=>'auth:admin','prefix' => 'admin'], function () {

    Route::resource('users','UsersController');
    Route::resource('recibo','ReciboController');
    
});

Route::get('users/{id}/destroy',[
    
    'middleware'=>'auth:admin',
    'uses' => 'UsersController@destroy',
    'as'=>'admin.users.destroy'
]);


Route::get('recibo/{id}/destroy',[

    'middleware'=>'auth:admin',
    'uses' => 'ReciboController@destroy',
    'as'=>'admin.recibo.destroy'
]);

Route::group(['middleware'=>'auth:edit','prefix' => 'edit'], function () {

    Route::resource('users','EditUserController');
    Route::resource('recibo','EditReciboController');

});


Route::group(['middleware'=>'auth:member','prefix' => 'member'], function () {

    Route::resource('users','MemberUserController');
    Route::resource('recibo','MemberReciboController');

});


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');



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