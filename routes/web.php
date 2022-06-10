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

 Route::get('/admin', 'Admin\Auth\AdminLoginController@login')->name('admin.login');
 Route::get('/admin/reset', 'AdminController@reset')->name('admin.reset');

Route::group(['middleware' => ['auth', 'role']], function() {
    
    Route::get('/admin/logout', 'Admin\LogOutController@logout')->name('admin.logout');
    Route::post('/admin/profile', 'Admin\ProfileController@updateProfile')->name('updateProfile');
    Route::post('/admin/profile/change/password', 'Admin\ChangePassword@changePassword')->name('adminChangePassword');
    Route::get('/admin/profile', 'Admin\ProfileController@profile')->name('profile');
    Route::get('/admin/dashboard', 'HomeController@index')->name('dashboard');

    route::group(['middleware' => 'admin'], function(){
        Route::get('/admin/general/setting', 'HomeController@generalsetting')->name('generalsetting');
        Route::post('/admin/general/setting', 'HomeController@updategeneralsetting')->name('updategeneralsetting');
        Route::get('/admin/users/clents', 'Admin\ClientsController@clients')->name('clients');
        Route::get('/admin/user/drivers', 'Admin\DriversController@drivers')->name('drivers');
        Route::post('/admin/user/drivers', 'Admin\DriversController@addDriver')->name('add.drivers');
        Route::get('/admin/form/submit/feedback', 'Admin\FormSubmitController@submit_feedBack')->name('submit.feedback');
        Route::get('/admin/form/billing/question', 'Admin\FormSubmitController@billing_question')->name('billing.question');
        Route::get('/admin/form/request/ride', 'Admin\FormSubmitController@request_ride')->name('request.ride');
        Route::get('/admin/form/other', 'Admin\FormSubmitController@other')->name('other');
    });
 });


//  Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');

// Route::get('/admin/{any}', function () {
//     return view('admin');
// });

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');





