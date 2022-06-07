<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| generalSetting Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){
    // Apis  in admin 
    Route::resource('web/general/setting', 'Admin\GeneralSetting\GeneralSettingController');
    Route::resource('web/profile', 'Admin\Profile\ProfileController');
    Route::post('web/profile/change/password', 'Admin\Profile\ChangePasswordController@changePassword');
    Route::resource('web/clients', 'Admin\Users\ClientController');
    Route::resource('web/drivers', 'Admin\Users\DriverController');
    Route::resource('web/form/billing/request', 'Admin\Form\BillingRequestController');
    Route::resource('web/form/others', 'Admin\Form\OtherController');
    Route::resource('web/form/request/ride', 'Admin\Form\RequestRideController');
    Route::resource('web/form/submit/feedback', 'Admin\Form\SubmitFeedBackController');
    Route::resource('web/show/lead', 'Admin\Lead\LeadController');
    Route::resource('web/show/driver/leads', 'Admin\Lead\DriverLeadController');
    Route::get('web/list/driver/leads', 'Admin\Lead\DriverLeadController@allleads');
    Route::get('web/driver/all', 'Admin\Users\DriverController@getAllDrivers');

    //admin widgets
    Route::get('web/amdin/widget/leads', 'Admin\Widgets\WidgetsController@statusCount');
    Route::get('web/admin/widget/user', 'Admin\Widgets\WidgetsController@userCount');
    Route::get('web/admin/widget/leads/unassign', 'Admin\Widgets\WidgetsController@unassigLeadCount');
    Route::get('web/admin/widget/leads/processing', 'Admin\Widgets\WidgetsController@processCount');




});
  
    

