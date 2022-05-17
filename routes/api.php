<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

Route::get('general/setting', 'Api\GenernalSettingController@index')->name('generalSetting');


Route::post('register', 'Api\UserController@register')->name('register');
Route::post('login', 'Api\UserController@login')->name('login');


Route::group(['middleware' => ['auth:api']], function(){
    Route::get('profile', 'Api\UserController@profile')->name('profile');
    Route::post('logout', 'Api\UserController@logout')->name('logout');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




