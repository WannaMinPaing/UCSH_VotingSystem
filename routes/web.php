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

//Admin User Auth
Route::get('admin/login','Auth\AdminLoginController@showLoginForm');
Route::post('admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

//User Auth
Auth::routes();

//Route::get('/','Frontend\PageController@home');

Route::middleware('auth')->namespace('Frontend')->group(function(){
    //Route::get('/voting','Frontend\PageController@voting');
    
});

Route::get('/','Frontend\PageController@home')->name('home');
Route::get('/contact','Frontend\PageController@contact')->name('contact');
Route::get('/percent','Frontend\PageController@percent')->name('percent');
Route::get('/rank','Frontend\PageController@rank')->name('rank');
Route::post('message-store','Backend\UserMessagesController@store')->name('message-store');
Route::get('getmailpwd/{id}','Frontend\PageController@getpwd');
Route::get('percent_count','Frontend\PageController@percent_count');
Route::get('rank_count','Frontend\PageController@rank_count');
Route::get('profile/{id}','Frontend\PageController@profile');