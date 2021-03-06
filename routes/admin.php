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
Route::group(['middleware' => ['status']], function(){
Route::group(['prefix'=>'admin','middleware'=>['auth']],function(){

    // Apis  in admin
    Route::resource('web/general/setting', 'Admin\GeneralSetting\GeneralSettingController');
    Route::resource('web/profile', 'Admin\Profile\ProfileController');
    Route::post('web/profile/change/password', 'Admin\Profile\ChangePasswordController@changePassword');
    // client
    Route::resource('web/clients', 'Admin\Users\ClientController');
    Route::put('web/block/client/{id}', 'Admin\Users\ClientController@block');
    Route::put('web/unblock/client/{id}', 'Admin\Users\ClientController@unblock');
    // drivers
    Route::resource('web/drivers', 'Admin\Users\DriverController');
    Route::get('web/all/driver', 'Admin\Users\DriverController@getDriver');
    Route::put('web/block/driver/{id}', 'Admin\Users\DriverController@block');
    Route::put('web/unblock/driver/{id}', 'Admin\Users\DriverController@unblock');
//    // driver payment
//    Route::resource('web/payment/driver', 'Admin\DriverPayment\DriverPaymentController');
//    Route::post('web/payment/payment/change/{id}', 'Admin\DriverPayment\DriverPaymentController@updateStatus');
//    Route::get('web/all/payment/driver', 'Admin\DriverPayment\DriverPaymentController@adminPaymentlist');
//    Route::get('web/payment/withdraw', 'Admin\DriverPayment\DriverPaymentController@driverpayment');
//    //admin approved payment
//    Route::resource('web/admin/payment/approve', 'Admin\WithDraw\ApprovePaymentController');

    Route::resource('web/form/billing/request', 'Admin\Form\BillingRequestController');
    Route::resource('web/form/others', 'Admin\Form\OtherController');
    Route::resource('web/form/request/ride', 'Admin\Form\RequestRideController');
    Route::get('web/form/request/unassign/ride', 'Admin\Form\RequestRideController@unassignRide');
    Route::put('web/form/status/request/ride/{id}', 'Admin\Form\RequestRideController@statusUpdate');
    Route::resource('web/form/submit/feedback', 'Admin\Form\SubmitFeedBackController');
    //admin driver leads
    Route::resource('web/show/lead', 'Admin\Lead\LeadController');
    Route::get('web/assign/leads', 'Admin\Lead\LeadController@leadsassign');
    Route::get('web/process/leads', 'Admin\Lead\LeadController@leadsprocess');
    Route::get('web/reject/leads', 'Admin\Lead\LeadController@leadsreject');
    Route::get('web/complete/leads', 'Admin\Lead\LeadController@leadcomplete');

    Route::resource('web/show/driver/leads', 'Admin\Lead\DriverLeadController');
    Route::get('web/list/driver/leads', 'Admin\Lead\DriverLeadController@allleads');
    Route::get('web/driver/leads', 'Admin\Lead\DriverLeadController@allDriverLeads');


    Route::get('web/driver/all', 'Admin\Users\DriverController@getAllDrivers');

    //admin widgets
    Route::get('web/amdin/widget/leads', 'Admin\Widgets\WidgetsController@statusCount');
    Route::get('web/admin/widget/user', 'Admin\Widgets\WidgetsController@userCount');
    Route::get('web/admin/widget/leads/unassign', 'Admin\Widgets\WidgetsController@unassigLeadCount');
    Route::get('web/admin/widget/leads/latest/5', 'Admin\Widgets\WidgetsController@latestLeads');

});
});

