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


  Route::group(['middleware' => 'auth'], function() {

    Route::get('user-profile','ProfileController@index')->name('userprofile');

    Route::post('save/post', 'PostController@savePost')->name('savePost');

    //cool-Like Related
    Route::get('like-post/{post_id}', 'ReactionController@likePost')->name('likePost');

    Route::get('count-like/{post_id}', 'ReactionController@countLike')->name('countLike');

    Route::get('/follow/user/{id}', 'FollowersController@store')->name('storeFollowers');

    Route::delete('/unfollow/user/{id}', 'FollowersController@destroy')->name('unfollowUser');

    Route::get('testing/{username}', 'ProfileController@userProfile')->name('findUserProfile');

    Route::get('newsfeed', 'NewsfeedController@newsfeed')->name('newsfeed');

    Route::post('post/front/newsfeed', 'PostController@postWithOutDestination')->name('postWithOutDestination');


    /**
    * Destinations
    **/
    Route::resource('destination', 'DestinationController');

    Route::get('/follow/destination/{id}', 'DestinationController@followStore')->name('destinationfollowStore');

    Route::delete('/unfollow/destination/{id}', 'DestinationController@unfollowDestination')->name('unfollowDestination');


  });


  // Route::get('like-post/{post_id}', function(Request $request , $post_id){
  //   $data = $post_id;
  //   return response()->json([
  //     'success' => 'Post Liked',
  //     'value' => $data
  //   ]);
  // })->name('likePost');



});
