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
Route::group(['namespace' => 'Api', 'as' => 'api.'], function () {
    Route::get('general/setting', 'GenernalSettingController@index')->name('generalSetting');
    Route::post('send/message', 'SendMessageController@sendMessage')->name('sendMessage');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@register')->name('register');

    Route::group(['middleware' => ['auth:api', 'user:api']], function () {
        // Route::get('email/verify/{hash}', 'VerificationController@verify')->name('verification.verify');
        // Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
        Route::get('user/billing/questions', 'GetMessageController@getBillingQuestionsById')->name('getBillingQuestionsById');
        Route::get('user/request/ride', 'GetMessageController@getRequestRidesByid')->name('getRequestRidesByid');
        Route::get('user/submit/feedback', 'GetMessageController@getSubmitFeedBacksByid')->name('getSubmitFeedBacksByid');
        Route::get('user/contact/others', 'GetMessageController@getContactOthersByid')->name('getContactOthersByid');

        Route::get('user', 'AuthenticationController@user')->name('user');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::put('update/profile/{id}', 'ProfileController@update');
        Route::put('update/password/{id}', 'ProfileController@changePassword');
    });

});








// Route::group(['middleware' => ['auth:api']], function(){

// });


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




