<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//
// Route::group(['namespace' => 'Front'] function() {
//
//
// });

Route::group(['namespace' => 'Front'], function() {

  Route::get('register', 'CustomRegisterController@customregister')->name('customRegister');

  Route::post('register/save', 'CustomRegisterController@saveregister')->name('customRegisterSave');

  Route::get('login', 'CustomRegisterController@login')->name('customLogin');

  Route::post('login/attempt', 'CustomRegisterController@postLogin')->name('postLogin');

  Route::get('user-profile', function() {
    return view('front.user.profile');
  })->name('userprofile');
});
