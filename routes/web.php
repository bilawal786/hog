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
Route::get('/driver/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login');
//Route::get('/reset', 'AdminController@reset')->name('admin.reset');
Route::get('/block', 'Admin\block\BlockController@block')->name('admin.block');
Route::get('/admin/logout', 'Admin\LogOutController@logout')->name('admin.logout');


Route::group(['middleware' => ['auth', 'status']], function() {
    Route::group(['middleware' => ['driver']], function(){
        //profile
        Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('updateProfile');
        Route::post('/profile/change/password', 'Admin\ChangePassword@changePassword')->name('adminChangePassword');
        Route::get('/profile', 'Admin\ProfileController@profile')->name('profile');
        //dashboard
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        //payment
        Route::get('/withdraw/{any}', 'WebDriver\Payment\DriverPaymentGetController@payment')->where('any', '.*')->name('driver.withdraw');
    });
    Route::group(['middleware' => ['admin']], function(){
        //setting
        Route::get('general/setting', 'Admin\Setting\GeneralSettingController@generalsetting')->name('generalsetting');
        Route::post('general/setting', 'Admin\Setting\GeneralSettingController@updategeneralsetting')->name('updategeneralsetting');
        //user
        Route::get('client/{any}', 'Admin\ClientsController@clients')->where('any', '.*')->name('clients');
        Route::get('driver/{any}', 'Admin\DriversController@drivers')->where('any', '.*')->name('drivers');
        //leads
        Route::get('/feedback/{any}', 'Admin\FormSubmitController@submit_feedBack')->where('any', '.*')->name('submit.feedback');
        Route::get('/question/{any}', 'Admin\FormSubmitController@billing_question')->where('any', '.*')->name('billing.question');
        Route::get('/request/ride/{any}', 'Admin\FormSubmitController@request_ride')->where('any', '.*')->name('request.ride');
        Route::get('/form/other/{any}', 'Admin\FormSubmitController@other')->where('any', '.*')->name('other');
        //payment
        Route::get('/payment/{any}', 'WebAdmin\Payment\DriverPaymentController@payment')->where('any', '.*')->name('driver.payment');
        Route::get('/schedule/driver', 'WebAdmin\Schedule\ScheduleController@viewCalender')->where('any', '.*')->name('schedule.driver');
    });
 });
Route::get('checkout/{id}', 'WebUser\Payment\PaymentController@payment')->name('payment.payment');
Route::get('success/{id}', 'WebUser\Payment\PaymentController@success')->name('payment.success');
Route::get('failure', 'WebUser\Payment\PaymentController@failure')->name('payment.failure');
Route::get('cancel', 'WebUser\Payment\PaymentController@cancel')->name('payment.cancel');
Route::get('{any}', function () {return view('app');})->where('any', '.*');





