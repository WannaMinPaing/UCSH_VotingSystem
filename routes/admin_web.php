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
Route::prefix('admin')->name('admin.')->namespace('Backend')->middleware('auth:admin_user')->group(function()
{
    Route::get('/','PageController@home')->name('home');
    
    Route::resource('voter','VoterController');
    Route::get('voter/datatable/ssd','VoterController@ssd');

    Route::resource('boy','BoyController');
    Route::get('boy/datatable/ssd','BoyController@ssd');
    Route::get('count/{id}','BoyController@showCount');

    Route::resource('message','UserMessagesController');
    Route::get('message/datatable/ssd','UserMessagesController@ssd');

});
   