<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register','AuthentifcationController@register');
Route::post('login','AuthentifcationController@login');

Route::groupe(['middleware'=>'jwt.verify'],function(){
    Route::get('user','AuthentifcationController@getUser');
    Route::ressource('todos','todod');
});