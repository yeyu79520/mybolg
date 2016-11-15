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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Test'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
		Route::get('/test',['as' => 'test', 'uses' => 'TestController@index']);
   
});
Route::group(['namespace' => 'ZpAdmin','prefix' => 'yeyu','middleware'=>'auth'], function()
{
    Route::get('personal/index',['as' => 'personal.index', 'uses' => 'PersonalController@index']);
});
Route::group(['namespace' => 'ZpAdmin','prefix' => 'yeyu'], function()
{
    Route::get('/login',['as' => 'yeyu.login', 'uses' => 'LoginController@login']);
    Route::post('/loginop',['as' => 'yeyu.loginop', 'uses' => 'LoginController@loginop']);
    
});