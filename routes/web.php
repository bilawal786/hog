<?php

use Illuminate\Support\Facades\Route;

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


// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/admin/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login');
//Route::get('/reset', 'AdminController@reset')->name('admin.reset');
Route::get('/block', 'Admin\block\BlockController@block')->name('admin.block');
Route::get('/admin/logout', 'Admin\LogOutController@logout')->name('admin.logout');


Route::group(['middleware' => ['auth']], function() {

    Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('updateProfile');
    Route::post('/profile/change/password', 'Admin\ChangePassword@changePassword')->name('adminChangePassword');
    Route::get('/profile', 'Admin\ProfileController@profile')->name('profile');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['middleware' => ['status', 'driver']], function(){

        Route::get('/withdraw/{any}', 'WebDriver\Payment\DriverPaymentGetController@payment')->where('any', '.*')->name('driver.withdraw');
    });

    Route::group(['middleware' => 'admin'], function(){
        Route::get('general/setting', 'Admin\Setting\GeneralSettingController@generalsetting')->name('generalsetting');
        Route::post('general/setting', 'Admin\Setting\GeneralSettingController@updategeneralsetting')->name('updategeneralsetting');
        Route::get('clints', 'Admin\ClientsController@clients')->name('clients');
        Route::get('driver/{any}', 'Admin\DriversController@drivers')->where('any', '.*')->name('drivers');
//        Route::post('drivers', 'Admin\DriversController@addDriver')->name('add.drivers');

        Route::get('/feedback/{any}', 'Admin\FormSubmitController@submit_feedBack')->where('any', '.*')->name('submit.feedback');
        Route::get('/question/{any}', 'Admin\FormSubmitController@billing_question')->where('any', '.*')->name('billing.question');
        Route::get('/request/ride/{any}', 'Admin\FormSubmitController@request_ride')->where('any', '.*')->name('request.ride');
        Route::get('/form/other/{any}', 'Admin\FormSubmitController@other')->where('any', '.*')->name('other');
        //payment
        Route::get('/payment/{any}', 'WebAdmin\Payment\DriverPaymentController@payment')->where('any', '.*')->name('driver.payment');
        Route::get('/schedule/driver', 'WebAdmin\Schedule\ScheduleController@viewCalender')->where('any', '.*')->name('schedule.driver');
    });
 });

Route::get('checkout', 'WebUser\payment\PaymentController@payment')->name('payment.payment');
Route::get('success', 'WebUser\payment\PaymentController@success')->name('payment.success');
Route::get('failure', 'WebUser\payment\PaymentController@failure')->name('payment.failure');
Route::get('cancel', 'WebUser\payment\PaymentController@cancel')->name('payment.cancel');
Route::get('{any}', function () {return view('app');})->where('any', '.*');





