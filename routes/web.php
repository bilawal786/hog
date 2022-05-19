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


Auth::routes();

 Route::get('/admin', 'AdminController@login')->name('admin.login');
 Route::get('/admin/reset', 'AdminController@reset')->name('admin.reset');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/admin/logout', 'Admin\LogOutController@logout')->name('admin.logout');
    Route::post('/admin/profile', 'Admin\ProfileController@updateProfile')->name('updateProfile');
    Route::post('/admin/profile/change/password', 'Admin\ChangePassword@changePassword')->name('adminChangePassword');

    Route::get('/admin/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/admin/general/setting', 'HomeController@generalsetting')->name('generalsetting');
    Route::post('/admin/general/setting', 'HomeController@updategeneralsetting')->name('updategeneralsetting');

    Route::get('/admin/profile', 'Admin\ProfileController@profile')->name('profile');
    
    
 });


//  Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');

// Route::get('/admin/{any}', function () {
//     return view('admin');
// });

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');





