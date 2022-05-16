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




 Route::get('/admin','AdminController@login')->name('admin-login');
 Route::get('/admin/reset','AdminController@reset')->name('reset');
 
Route::get('/admin/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/admin/gernal/setting', 'HomeController@gernalsetting')->name('gernalsetting');


Auth::routes();


//  Route::get('/admin/dashboard','AdminController@dashboard')->name('dashboard');

// Route::get('/admin/{any}', function () {
//     return view('admin');
// });

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');





