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

Route::get('/', 					'FrontController@index') ;

Auth::routes();
Route::get('verify/{token}', 		'Auth\RegisterController@verify' ) ;

Route::get('home', 					'HomeController@index')->name('home');
Route::get('verification', 			'FrontController@verification')->name('verification');

Route::get('history', 				'HomeController@history')->name('history');
Route::get('trending', 				'HomeController@trending')->name('trending');
Route::get('profile', 				'HomeController@profile')->name('profile');
Route::post('profile', 				'HomeController@post_profile')->name('post_profile');
Route::get('videos/{category}', 	'HomeController@video_by_category')->name('video_by_category');
Route::get('playlist/{username}', 	'HomeController@playlist')->name('playlist');
Route::get('profile', 				'HomeController@profile')->name('profile');
Route::get('upload', 				'HomeController@upload')->name('upload');
Route::get('watch/{id}', 			'HomeController@watch')->name('watch');
Route::post('upload', 				'HomeController@video_upload')->name('video_upload');

Route::get('category', 				'HomeController@category')->name('category') ;
Route::get('category/delete/{id}', 	'HomeController@delete_category')->name('delete_category') ;
Route::post('category', 			'HomeController@post_category')->name('post_category') ;

Route::get('user', 					'HomeController@user')->name('user') ;
Route::get('user/delete/{id}', 		'HomeController@delete_user')->name('delete_user') ;
Route::get('user/block/{id}', 		'HomeController@block_user')->name('block_user') ;
Route::get('user', 					'HomeController@user')->name('user') ;
Route::get('block', 				'HomeController@block')->name('block') ;
Route::post('user', 				'HomeController@post_user')->name('post_user') ;

Route::get('blocked', 				'FrontController@blocked');
Route::get('login/github', 			'FrontController@redirectToProvider');
Route::get('login/github/callback', 'FrontController@handleProviderCallback');

Route::get('users_in_system', 		'ReportsController@users_in_system')->name( 'users_in_system' ) ;
Route::get('videos_per_user', 		'ReportsController@videos_per_user')->name( 'videos_per_user' ) ;
Route::get('videos_in_system', 		'ReportsController@videos_in_system')->name( 'videos_in_system' ) ;
Route::get('registration_period', 	'ReportsController@registration_period')->name( 'registration_period' ) ;

Route::get('pdf/users_in_system', 		'ReportsController@pdf_users_in_system')->name( 'pdf_users_in_system' ) ;
Route::get('pdf/videos_per_user', 		'ReportsController@pdf_videos_per_user')->name( 'pdf_videos_per_user' ) ;
Route::get('pdf/videos_in_system', 		'ReportsController@pdf_videos_in_system')->name( 'pdf_videos_in_system' ) ;
Route::get('pdf/registration_period', 	'ReportsController@pdf_registration_period')->name( 'pdf_registration_period' ) ;
